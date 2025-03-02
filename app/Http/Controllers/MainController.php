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
        $addRequest = \App\Models\CertificateRequest::create([
            'last_name' => $validData['last_name'],
            'first_name' => $validData['first_name'],
            'middle_name' => $validData['middle_name'] ?? null,
            'iin' => $validData['iin'],
            'activity_type' => $validData['activity_type'],
            'specialty' => $validData['specialty'],
            'phone' => $validData['phone'],
            'workplace' => $validData['workplace'] ?? null,
            'sender_name' => $validData['sender_name'] ?? null,
            'document' => $validData['document'] ?? null,
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

        return response()->json([
            'status' => true,
            'message' => 'Заявка успешно отправлена'
        ]);
    }
}
