<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function showForm() {
        return view('contact');
    }
    
    public function store(Request $request){

        Contact::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),           
        ]);

        return response()->json(['message' => 'Данные отправлены'], 200);
    }
}
