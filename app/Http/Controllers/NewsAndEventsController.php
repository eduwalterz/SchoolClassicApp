<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsandEvents;

class NewsAndEventsController extends Controller
{
    //method that renders news_and_events
    public function news_and_events(){
        $newsandevents1=NewsandEvents::latest()->first();
        $newsandevents=NewsandEvents::all();
        return view('pages.news_and_events',compact('newsandevents','newsandevents1'));
    }

    public function newsAndEventsSection(Request $request){
        $totalnewsandevents=count(NewsandEvents::all());
        $newsandevents=NewsandEvents::all();
        return view('admin.newsandevents',compact('newsandevents','totalnewsandevents'));
    }

    public function addNewsandEventsData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'dates'=>'required|string|min:3',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);
        $id=$request->id;

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);


        NewsandEvents::create([
            'main_heading'=>$request->main_heading,
            'image'=>$imageName,
            'dates'=>$request->dates,
            'sub_heading'=>$request->sub_heading,
            'paragraph'=>$request->paragraph
        ]);
        
        return redirect()->back()->with('success', 'Data Added Successfully');
    
    }

    public function editNewsandEventsData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'dates'=>'required|string|min:3',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);

        $id=$request->id;

        if(!empty($request->image)){
            $request->validate([
               'image'=>'required|image|mimes:png,jpeg,jpg'
            ]);

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);

            //update data
            NewsandEvents::where(['id'=>$id])->update([
                'main_heading'=>$request->main_heading,
                'image'=>$imageName,
                'dates'=>$request->dates,
                'sub_heading'=>$request->sub_heading,
                'paragraph'=>$request->paragraph
            ]);

            return redirect()->back()->with('success', 'Data Updated Successfully');
        }
    
    }

    public function deleteNewsandEventsData(Request $request){
        $id=$request->id;
        NewsandEvents::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}
