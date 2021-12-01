<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carausel;
use App\MarketingSectionMain;
use App\MarketingRow;
use App\HistoryMissionVission;
use App\StaffsMainSection;
use App\StaffsRowSection;
use App\AccomplishmentFirstSection;
use App\AccomplishmentSecondSection;

class AboutUsController extends Controller
{
    //


    public function history_mission_vission(){
        $historymissionvissiondata=HistoryMissionVission::all();
        return view('pages.history_mission_vission',compact('historymissionvissiondata'));

    }

    //STAFF MESTHOD

    public function staffs(){
        $staffsmainsectiondata=StaffsMainSection::latest()->first();
        $staffsrowsection=StaffsRowSection::all();
        return view('pages.staffs',compact('staffsmainsectiondata','staffsrowsection'));
    }

    //accomplishment
    public function accomplishment(){
        $accomplishmentfirstsection=AccomplishmentFirstSection::latest()->first();
        $accomplishmentsecondsection=AccomplishmentSecondSection::latest()->first();
        return view('pages.accomplishment',compact('accomplishmentfirstsection','accomplishmentsecondsection'));
    }

    public function welcome(){
        //adding data from tme marketing roe section 
        $marketingrows=MarketingRow::all();
        //adding data from the marketingmain table to the welcome page
        $marketingsectionmain=MarketingSectionMain::Latest()->first();
        $images=Carausel::all();

        return view('welcome',compact('images','marketingsectionmain','marketingrows'));
    }

    public function search(Request $request){
        $search=$request->get('query');
        $images=carausel::where('image_name','like','%'.$search. '%')->get();
        return view('admin.search',['images'=>$images]);
       // $search_text=$_GET['query'];
        //$images=carausel::where('image_name','LIKE','%'.$search_text.'%')->get();

       //return view('admin.search',compact('images'));
    }

    public function HostoryMissionVission(){
        $totalhistorymissionvissionData=count(HistoryMissionVission::all());
        $historymissionvissiondata=HistoryMissionVission::all();
        return view('admin.historymissionvission',compact('historymissionvissiondata','totalhistorymissionvissionData'));
    }

    public function addHistoryMissionVission(Request $request){
        $request->validate([
            'fontawesome'=>'required|string|min:3',
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);

        HistoryMissionVission::create([
            'fontawesome'=>$request->fontawesome,
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph
        ]);
            return redirect()->back()->with('success', 'Content Added Successfully');
    }

    public function updateHistoryMissionVission(Request $request){
        $request->validate([
            'fontawesome'=>'required|string|min:3',
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);
        $id=$request->id;

        HistoryMissionVission::where(['id'=>$id])->update([
            'fontawesome'=>$request->fontawesome,
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph
        ]);
        return redirect()->back()->with('success','Data Update Successfully');
    }

    public function deleteHistoryMissionVission(Request $request){
        $id=$request->id;
        HistoryMissionVission::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Record Delete Successfully');
    }

    public function StaffsMainSection(){
        $totalstaffsrowsection=count(StaffsRowSection::all());
        $totalstaffsmainsection=count(StaffsMainSection::all());
        $staffsrowsection=StaffsRowSection::all();
        $staffsmainsectiondata=StaffsMainSection::all();
        return view('admin.staffsmainsection',compact('staffsmainsectiondata','staffsrowsection','totalstaffsmainsection','totalstaffsrowsection'));
    }

    public function addStaffsMainSection(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'staff_name'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);


        StaffsMainSection::create([
            'image'=>$imageName,
            'staff_name'=>$request->staff_name,
            'paragraph'=>$request->paragraph
        ]);

        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function updateStaffsMainSection(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'staff_name'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);
        $id=$request->id;

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        StaffsMainSection::where(['id'=>$id])->update([
            'image'=>$imageName,
            'staff_name'=>$request->staff_name,
            'paragraph'=>$request->paragraph
        ]);
        return redirect()->back()->with('success','Information Updated Successfully');
    }

    public function deleteStaffsMainSection(Request $request){
        $id=$request->id;
        StaffsMainSection::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    public function addStaffsRowSection(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'staff_name'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        StaffsRowSection::create([
            'image'=>$imageName,
            'staff_name'=>$request->staff_name,
            'paragraph'=>$request->paragraph
        ]);

        return redirect()->back()->with('success','Data added Successfully');
    }

    public function updateStaffsRowSection(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'staff_name'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);
        $id=$request->id;

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        StaffsRowSection::where(['id'=>$id])->update([
            'image'=>$imageName,
            'staff_name'=>$request->staff_name,
            'paragraph'=>$request->paragraph
        ]);

        return redirect()->back()->with('success','Record Updated Successfully');
    }

    public function deleteStaffsRowSection(Request $request){
        $id=$request->id;
        StaffsRowSection::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Record Deleted Successully');
    }

    public function viewAccomplishmentSection(){
        $totalaccomplishmentsecondsection=count(AccomplishmentSecondSection::all());
        $accomplishmentsecondsection=AccomplishmentSecondSection::all();
        $totalaccomplishmentfirstsection=count(AccomplishmentFirstSection::all());
        $accomplishmentfirstsection=AccomplishmentFirstSection::all();
        return view('admin.accomplishment',compact('accomplishmentfirstsection','totalaccomplishmentfirstsection','accomplishmentsecondsection','totalaccomplishmentsecondsection'));
    }

public function addAccomplishmentFirstSection(request $request){
    $request->validate([
        'heading'=>'required|string|min:3',
        'image'=>'required|image|mimes:jpg,png,jpeg',
        'paragraph'=>'required|string|min:3',
        'fontawesome'=>'required|string|min:3',
        'dates'=>'required|string|min:3'
    ]);

    $imageName=time().'.'.$request->image->extension();
    $request->image->move(public_path('images'),$imageName);

    AccomplishmentFirstSection::create([
        'heading'=>$request->heading,
        'image'=>$imageName,
        'paragraph'=>$request->paragraph,
        'fontawesome'=>$request->fontawesome,
        'dates'=>$request->dates
    ]);
    return redirect()->back()->with('success','Information Added Succeassfully');
    }

    public function updateAccomplishmentFirstSection(Request $request){
        $request->validate([
            'heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'paragraph'=>'required|string|min:3',
            'fontawesome'=>'required|string|min:3',
            'dates'=>'required|string|min:3'
        ]);
        $id=$request->id;

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        AccomplishmentFirstSection::where(['id'=>$id])->update([
            'heading'=>$request->heading,
            'image'=>$imageName,
            'paragraph'=>$request->paragraph,
            'fontawesome'=>$request->fontawesome,
            'dates'=>$request->dates
        ]);

        return redirect()->back()->with('success','Information Updated Successfully');
    }

    public function deleteAccomplishmentFirstSection(Request $request){
        $id=$request->id;
        AccomplishmentFirstSection::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Infor Deleted Successfully');
    }

    public function addAccomplishmentSecondSection(Request $request){
        $request->validate([
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'fontawesome'=>'required|string|min:3',
            'dates'=>'required|string|min:3'
        ]);
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        AccomplishmentSecondSection::create([
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph,
            'image'=>$imageName,
            'fontawesome'=>$request->fontawesome,
            'dates'=>$request->dates
        ]);
        return redirect()->back()->with('success', 'Data Added Successfully');
    }

    public function updateAccomplishmentSecondSection(Request $request){
        $request->validate([
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'fontawesome'=>'required|string|min:3',
            'dates'=>'required|string|min:3'
        ]);
        $id=$request->id;

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        AccomplishmentSecondSection::where(['id'=>$id])->update([
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph,
            'image'=>$imageName,
            'fontawesome'=>$request->fontawesome,
            'dates'=>$request->dates
        ]);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    public function deleteAccomplishmentSecondSection(Request $request){
        $id=$request->id;
        AccomplishmentSecondSection::where(['id'=>$id])->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
