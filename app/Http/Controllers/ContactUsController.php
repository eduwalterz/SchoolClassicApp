<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsData;
use App\ContactDetails;

class ContactUsController extends Controller
{
    //method that renders contact us view

    public function contact_us(){
        return view('pages.contact_us');
    }

    public function addContact_Us(Request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email|min:3',
            'subject'=>'required|string|min:3',
            'message'=>'required|string|min:3'
        ]);

        ContactUsData::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);

        return redirect()->back()->with('success','Mail sent Successfully');
    }

    public function viewContact_Us(){
        $contactdetails=ContactDetails::all();
        $totalcontactus=count(ContactUsData::all());
        $contactus=ContactUsData::all();
        return view('admin.viewcontact_us',compact('contactus','totalcontactus','contactdetails'));
    }

    public function deleteContact_Us(Request $request){
        $id=$request->id;
        ContactUsData::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }

    public function addContact_UsDetails(Request $request){
        $request->validate([
            'fontawesome'=>'required|string|min:3',
            'contacts'=>'required|string|min:3',
            'tags'=>'required|string|min:3'
        ]);


        ContactDetails::create([
            'fontawesome'=>$request->fontawesome,
            'contacts'=>$request->contacts,
            'tags'=>$request->tags
        ]);

        return redirect()->back()->with('success', 'Contacts Added Successfully');
    }

    public function updateContact_UsDetails(Request $request){
        $request->validate([
            'fontawesome'=>'required|string|min:3',
            'contacts'=>'required|string|min:3',
            'tags'=>'required|string|min:3'
        ]);
        $id=$request->id;

        ContactDetails::where(['id'=>$id])->update([
            'fontawesome'=>$request->fontawesome,
            'contacts'=>$request->contacts,
            'tags'=>$request->tags
        ]);
            return redirect()->back()->with('success','Record Update Successfully');
    }


    public function deleteContact_UsDetails(Request $request){
        $id=$request->id;
        ContactDetails::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}
