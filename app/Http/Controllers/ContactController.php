<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function showForm() {
        return view('contact');
    }
    
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|regex:/^[a-zA-Zа-яА-Я\s]+$/u',
            'phone' => 'required|string|max:20|regex:/^\+?[0-9\s\-\(\)]{10,20}$/',
            'email' => 'required|email|unique:contacts,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,           
        ]);

        Mail::to('abievsultann@mail.ru')->send(new ContactMail($contact));

        return response()->json(['message' => 'Данные отправлены'], 200);
    }
}
