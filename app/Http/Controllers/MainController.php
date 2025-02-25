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
        $addRequest = \App\Models\CertificateRequest::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'iin' => $request->iin,
            'activity_type' => $request->activity_type,
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'workplace' => $request->workplace,
            'sender_name' => $request->sender_name,
            'document' => $request->document,
            'status' => "new",
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
