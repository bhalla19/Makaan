<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Apartment;

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

    public function uploadForm(){
        return view('uploadForm');
    }

    public function uploads(Request $request){
        $request->validate([
            "name"=>"required",
            "price"=>"required",
            "address"=>"required",
            "file"=>"required"
        ]);

        $apartment = new Apartment;
        $apartment->name = $request['name'];
        $apartment->price = $request['price'];
        $apartment->address = $request['address'];
        $apartment->file = $request['file'];
        $apartment->save();

    }

    public function form_view(Request $request)
{
    $search = $request['search'] ?? "";
    if ($search != "") {
        $apartment = Apartment::where("name", "LIKE", "%$search%")
                                ->orWhere("email", "LIKE", "%$search%")
                                ->get();
    } else {
        $apartment = Apartment::paginate(10);
    }
    
    $stored_data = compact('apartment', 'search');
    return view('index', $stored_data); // Passing the $stored_data directly to the view
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

