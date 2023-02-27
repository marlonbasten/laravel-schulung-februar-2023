<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\ContactRequest;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function create()
    {
        $contactRequest = ContactRequest::find(1);
        $contactRequest->restore();

//        dd($contactRequests);

        return view('contact');
    }

    public function store(StoreContactRequest $request)
    {
        ContactRequest::create([
            'uuid' => Str::uuid(), ...$request->validated()
        ]);

        return redirect()->back()->with('message', 'Erfolgreich gesendet!');
    }
}
