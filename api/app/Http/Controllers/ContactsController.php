<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $contact = Contact::create($this->validate($request, [
            'fullname' => 'required',
            'email'    => 'required|email',
            'message'  => 'required',
        ]));

        return response($contact, 201);
    }
}
