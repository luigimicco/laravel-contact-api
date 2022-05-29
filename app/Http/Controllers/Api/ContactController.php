<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Send an email from the website form.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // # Validazione
        $validator = Validator::make(
            $data,
            [
                'name' => 'required',
                'subject' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ],
            [
                'name.required' => 'Il nome è obbligatorio [da Laravel].',
                'subject.required' => 'L\'oggetto è obbligatorio [da Laravel].',
                'email.required' => 'La mail è obbligatoria [da Laravel].',
                'email.email' => 'L\'indirizzo email non è valido [da Laravel].',
                'message.required' => 'Il testo del messaggio è obbligatorio [da Laravel].'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        };

        $contact = new Contact();
        $contact->fill($data);
        $contact->save();
        
        return response('Mail sent successfully', 204); // o return response('Mail received', 201)
    }
}
