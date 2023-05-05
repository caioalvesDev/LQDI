<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Mail\RegistrationEmail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function create(Request $request){
        return json_encode($data);
    }

    public function sendEmail($data){
        Mail::to('lqdi@maill.com')->send(new RegistrationEmail($data));
        return response()->json('email enviado com sucesso');
    }

    public function store(StoreContactRequest $request)
    {
        if ($request->hasFile('img')) {
            dd(true);
        }
        if (Contact::create($request->validated())) {
            $data = [
                "email" => $request->input("email"),
                "subject" => $request->input("subject"),
                "name" => $request->input("name"),
            ];
            $this->sendEmail($data);
            return response()->json('Criado com sucesso');
        }
    }
    public function index () {
        $data = Contact::get(['email', 'name']);
        return response()->json(["data" => $data]);
    }
}
