<?php

namespace App\Http\Controllers;

use App\Events\ContactAdded;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ContactsController extends Controller
{
    /**
     * Store Contact Record
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $contact = Contact::create($this->validate($request, [
            'fullname' => 'required',
            'email'    => 'required|email',
            'message'  => 'required',
            'phone'    => 'nullable',
        ]));

        Event::dispatch(new ContactAdded($contact));

        return response()
            ->json($contact, 201);
    }
}
