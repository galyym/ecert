<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $positions = \App\Models\Position::all()->toArray();
        return view('welcome')->with('positions', $positions);
    }

    public function certRequest(CertificateRequest $request)
    {
        $validData = $request->validated();

        foreach ($validData['requests'] as $value) {
            $addRequest = \App\Models\CertificateRequest::create([
                'last_name' => $value['last_name'],
                'first_name' => $value['first_name'],
                'middle_name' => $value['middle_name'] ?? null,
                'iin' => $value['iin'],
                'activity_type' => $value['activity_type'],
                'specialty' => $value['specialty'],
                'phone' => $value['phone'],
                'workplace' => $value['workplace'] ?? null,
                'sender_name' => $value['sender_name'] ?? null,
                'document' => $value['document'] ?? null,
                'status' => "new",
                'chat_id' => 0
            ]);

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $addRequest->document = $filename;
                $addRequest->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Заявка успешно отправлена'
        ]);
    }

    public function checkCert(Request $request)
    {
        $cert = \App\Models\CertificateRequest::where('iin', $request->iin)
            ->where('status', 'confirmed')
            ->get();

        $result = [];
        if ($cert->isNotEmpty()) {
            foreach ($cert as $value) {
                $result[] = [
                    'certificate_number' => $value->certificate_number,
                    'certificate_date' => $value->certificate_date,
                    'certificate_file' => \Storage::disk('public')->url($value->certificate_file),
                ];
            }
        }

        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Заявка найдена',
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Заявка не найдена'
            ]);
        }
    }
}
