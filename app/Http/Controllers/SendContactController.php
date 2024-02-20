<?php

namespace App\Http\Controllers;

use App\Models\SendContact;
use Illuminate\Http\Request;

class SendContactController extends Controller
{
    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|string|',
            'message' => 'required|string',
        ]);

        $requestData = $request->all();
        SendContact::create($requestData);

        return redirect()->route('main')->with('success', 'your message has been sent');
    }
}
