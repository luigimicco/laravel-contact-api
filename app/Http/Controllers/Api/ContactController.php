<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        
        //$data['email'] = "";
        $mail = new SendNewMail($data);
        try {
            Mail::to(env('MAIL_ADMIN_ADDRESS'))->send($mail); // MAIL_ADMIN_ADDRESS è stata aggiunta nel file ENV
            return response('Email inviata con successo', 204); // o return response('Mail received', 201)
        } catch (ModelNotFoundException  $exception) {
            return response('Messaggio non inviato. Si è verificato un errore. Riprovare più tardi [da Laravel]', 204); // o return response('Mail received', 201)
        }
    }
}
