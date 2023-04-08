<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller{
    
    /*public function index(){
        return view('contactanos.index');
    }*/

    public function store(Request $request){
        $mail = new ContactanosMailable($request->all());

        Mail::to('ignaciodeserti@gmail.com')->send($mail);

        return redirect()->route('contactanos.index')->with('info', "Mensaje enviado");
    }

}
