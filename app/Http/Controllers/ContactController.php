<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function AdminAddContact(){
        return view('admin.contact.create');
    }
    public function AdminStoreContact(Request $request){
        
        // //By ORM
        Contact::insert([

            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'created_at'=>Carbon::now()
        ]);
        

        return redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully!');
    }
    public function AdminEditContact($id){
        $contacts= Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }
    public function AdminUpdateContact(Request $request, $contactId){
        
        // Update the contact fields
        Contact::where('id', $contactId)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);
        
        return redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully!');
    }

    
    public function AdminDeleteContact($id){
       
        Contact::find($id)->delete();
        // $contacts=DB::table('contacts')->where('id',$id)->first();
        return redirect()->back()->with('success', 'Contact Permanently Deleted');
    }

    public function Contact(){
         $contacts=DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }
    public function ContactForm(Request $request){
        
        // //By ORM
        ContactForm::insert([

            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()
        ]);
        

        return redirect()->route('contact')->with('success', 'Your Messege Send Successfully!');
    }

    public function AdminMessage(){
        $messages=ContactForm::all();
       return view('admin.contact.message',compact('messages'));
   }
   public function MessageDelete($id){

    ContactForm::find($id)->delete();
    return redirect()->back()->with('success', 'Message Permanently Deleted');
}


}
