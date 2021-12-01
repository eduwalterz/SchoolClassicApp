<?php

namespace App\Http\Controllers;
use App\Carausel;
use App\MarketingSectionMain;
use DB;
use PDF;
use App\MarketingRow;

use Illuminate\Http\Request;
use App\Exports\CarauselExport;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        return view('home');
    }

    public function homepage(){
        //get marketing row data
        $marketingrowdata=MarketingRow::all();
        //counting marketing row data
        $totalmarketingrowData=count(MarketingRow::all());

        


        $marketingData=count(MarketingSectionMain::all());
        $query=Carausel::all();
        $total=count($query);
        $images= Carausel::latest()->paginate(5);
        $marketingsectionmain=MarketingSectionMain::latest()->first();
        return view('admin.homepage',compact('images','total','marketingsectionmain','marketingData','totalmarketingrowData','marketingrowdata'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function addCarausel(request $request){
        $request->validate([
            'image_name'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg,jfif'
        ]);

        //generate image name
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        //add the name of the image to the database
        Carausel::create([
            'image_name'=>$request->image_name,
            'image'=>$imageName
        ]);

        //redirect
        return redirect()->back()->with('success','Image has been added Successfully');
    }

    //method for editing carausel
    public function editCarausel(Request $request){
        //validate image name
        $request->validate([
            'image_name'=>'required|string|min:3'
        ]);

        $id=$request->id;

        if(!empty($request->image)){
            $request->validate([
                'image'=>'required|image|mimes:jpg,png,jpeg,jfif'
            ]);

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
    
            //update data
            Carausel::where(['id'=>$id])->update([
                'image_name'=>$request->image_name,
                'image'=>$imageName
            ]);

            return redirect()->back()->with('success','Image Updated Successfully');
        }
        else{
                //update data
                Carausel::where(['id'=>$id])->update([
                    'image_name'=>$request->image_name,
                ]);

                return redirect()->back()->with('success','Image Updated Successfully');
        }
    }

    //delete carausel
    public function deleteCarausel(Request $request){
        $id=$request->id;
        Carausel::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }

    //addmarketingmain method
    public function addMarketingMain(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'main_paragraph'=>'required|string|min:3'
        ]);
   

    //deleting existing record in the database
    //$delete=DB::table('marketingsectionmains_tables')->delete();
    //if($delete){
    //add data to the database
    MarketingSectionMain::create([
        'main_heading'=>$request->main_heading,
        'main_paragraph'=>$request->main_paragraph,
    ]);
    return redirect()->back()->with('success','Data Saved successfully');
   // }
}

// download fuction
    public function download(){
        $download=DB::table('carausels')->get();
        return view('admin.homepage',compact('download'));
    }

    //method for updating marketing main section
    public function updateMarketingMain(Request $request){
        $validate= $request->validate([
            'main_heading'=>'required|string|min:3',
            'main_paragraph'=>'required|string|min:3'
        ]);
    
        $id=$request->id;

        //update marketing section
        $update=MarketingSectionMain::where(['id'=>$id])->update([
            'main_heading'=>$request->main_heading,
            'main_paragraph'=>$request->main_paragraph,
        ]);

        return redirect()->back()->with('success','Data Updated Successfully');
    }

    //method for deleting in the marketing main section
    public function deleteMarketingMain(Request $request){
        $id=$request->id;
        $delete=MarketingSectionMain::where(['id'=>$id])->delete();

        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    //method to download record as pdf file
    public function downloadpdf(){
        $carausels = Carausel::all();
        return view('admin.homepage',compact('carausels'));
    }

    public function downloadPdfFile(){
     $carausels = Carausel::all();
     $pdf = PDF::loadView('admin.downloadFile',compact('carausels'));
     return $pdf->download('carausels.pdf');
    }
    //method for adding marketing row data
    public function addMarketingRowData(Request $request){
        //validate data
        $request->validate([
            'fontawesome'=>'required|string|min:3',
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
        ]);

        //add data to the table marketing row
        MarketingRow::create([
            'fontawesome'=>$request->fontawesome,
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph
        ]);

        return redirect()->back()->with('success', 'Data saved Successfully');
    }

    //editing method in marketing row section
    public function updateMarketingRowData(Request $request){
        $validate= $request->validate([
            'fontawesome'=>'required|string|min:3',
            'heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3'
        ]);
    
        $id=$request->id;

        //update marketing row section
        $update=MarketingRow::where(['id'=>$id])->update([
            'fontawesome'=>$request->fontawesome,
            'heading'=>$request->heading,
            'paragraph'=>$request->paragraph
        ]);

        return redirect()->back()->with('success','Data Updated Successfully');
    
    }

    //deleting data for marketing row section
    public function deleteMarketingRowData(Request $request){
        $id=$request->id;
        $delete=MarketingRow::where(['id'=>$id])->delete();

        return redirect()->back()->with('success','Record Deleted Successfully');
    }







    public function downloadCSV(){
       return Excel::download(new CarauselExport,'carausel.csv');
    }

    public function downloadExcel(){
       return Excel::download(new CarauselExport,'carausel.xlsx');
    }


}
