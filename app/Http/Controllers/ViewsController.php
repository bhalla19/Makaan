<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ViewsController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function testimonials(){
        return view('testimonial');
    }

    public function Error404(){
        return view('404');
    }

    public function contactUs(){
        return view('contact');
    }

    public function ContactForm(Request $request){
        $request->validate([
            "name"=>'required',
            "email"=>'required',
            "subject"=>'required',
            "message"=>'required'
        ]);

       $Contact = new contact;
       $Contact->name = $request['name'];
       $Contact->email = $request['email'];
       $Contact->subject = $request['subject'];
       $Contact->message = $request['message'];
       $Contact->save();
       return redirect('/');

    }

    public function propertyAgent(){
        return view('property-agent');
    }

    public function propertyList(){
        return view('property-list');
    }

    public function propertyType(){
        return view('property-type');
    }
}

