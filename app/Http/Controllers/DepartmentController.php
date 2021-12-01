<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IctDepartment;
use App\BigdataDepartment;
use App\FinanceDepartment;
use App\carausel;

class DepartmentController extends Controller
{
    //ict method
    public function ict(){
        $ictdepartment=IctDepartment::latest()->first();
        return view('pages.ict',compact('ictdepartment'));
    }

    //ict method in admin section
    public function ictdepartment(){
        $totalictdepartment=count(IctDepartment::all());
        $ictdepartment=IctDepartment::latest()->first();
        return view('admin.ictdepartment',compact('ictdepartment','totalictdepartment'));
    }

    //bigdata method
    public function bigdata(){
        $bigdatadepartment=BigdataDepartment::latest()->first();
        return view('pages.bigdata',compact('bigdatadepartment'));
    }

    //bigdata method in admin side
    public function BigDataDepartment(){
        $bigdatadepartment=BigDataDepartment::latest()->first();
        return view('admin.bigDataDepartment',compact('bigdatadepartment'));
    }

    //finance method
    public function finance(){
        $financedepartment=FinanceDepartment::latest()->first();
        return view('pages.finance',compact('financedepartment'));
    }

    //finance method in admin side
    public function financeDepartment(){
        $financedepartment=FinanceDepartment::latest()->first();
        return view('admin.financeDepartment',compact('financedepartment'));
    }

        //method to add data to the ict department table
    public function addIctDepartmentData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'persona'=>'required|string|min:3',
            'persona_title'=>'required|string|min:3'
        ]);
        $id=$request->id;

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);


        IctDepartment::create([
            'main_heading'=>$request->main_heading,
            'image'=>$imageName,
            'sub_heading'=>$request->sub_heading,
            'paragraph'=>$request->paragraph,
            'persona'=>$request->persona,
            'persona_title'=>$request->persona_title
        ]);
        
        return redirect()->back()->with('success', 'Data Added Successfully');
    
    }

    //method to update data in yhe ict department
    public function editIctDepartmentData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'persona'=>'required|string|min:3',
            'persona_title'=>'required|string|min:3'
        ]);

        $id=$request->id;

        if(!empty($request->image)){
            $request->validate([
               'image'=>'required|image|mimes:png,jpeg,jpg'
            ]);

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);

            //update data
            IctDepartment::where(['id'=>$id])->update([
                'main_heading'=>$request->main_heading,
                'image'=>$imageName,
                'sub_heading'=>$request->sub_heading,
                'paragraph'=>$request->paragraph,
                'persona'=>$request->persona,
                'persona_title'=>$request->persona_title
            ]);

            return redirect()->back()->with('success', 'Data Updated Successfully');
        }
    }


    //method to delete data in the ictdepartment
    public function deleteIctDepartmentData(Request $request){
        $id=$request->id;
        IctDepartment::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }


    public function addBigdataDepartmentData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'owner'=>'required|string|min:3',
            'owner_title'=>'required|string|min:3'
        
        ]);
        $id=$request->id;
            
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);

            BigDataDepartment::create([
                'main_heading'=>$request->main_heading,
                'image'=>$imageName,
                'sub_heading'=>$request->sub_heading,
                'paragraph'=>$request->paragraph,
                'owner'=>$request->owner,
                'owner_title'=>$request->owner_title
            ]);
            
            return redirect()->back()->with('success', 'Data Added Successfully');
        }

        public function editBigdataDepartmentData(Request $request){
            $request->validate([
                'main_heading'=>'required|string|min:3',
                'image'=>'required|image|mimes:png,jpg,jpeg',
                'sub_heading'=>'required|string|min:3',
                'paragraph'=>'required|string|min:3',
                'owner'=>'required|string|min:3',
                'owner_title'=>'required|string|min:3'
            ]);
    
            $id=$request->id;
    
            if(!empty($request->image)){
                $request->validate([
                   'image'=>'required|image|mimes:png,jpeg,jpg'
                ]);
    
                $imageName=time().'.'.$request->image->extension();
                $request->image->move(public_path('images'),$imageName);
    
                //update data
                BigdataDepartment::where(['id'=>$id])->update([
                    'main_heading'=>$request->main_heading,
                    'image'=>$imageName,
                    'sub_heading'=>$request->sub_heading,
                    'paragraph'=>$request->paragraph,
                    'owner'=>$request->owner,
                    'owner_title'=>$request->owner_title
                ]);
    
                return redirect()->back()->with('success', 'Data Updated Successfully');
            }
        }

        //method to delete data in the ictdepartment
    public function deleteBigdataDepartmentData(Request $request){
        $id=$request->id;
        BigDataDepartment::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }

    


    //method for finance department admin section
    public function addFinanceDepartmentData(Request $request){
        $request->validate([
            'main_heading'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'sub_heading'=>'required|string|min:3',
            'paragraph'=>'required|string|min:3',
            'author'=>'required|string|min:3',
            'author_title'=>'required|string|min:3'
        ]);

        $id=$request->id;

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
    
            FinanceDepartment::create([
                'main_heading'=>$request->main_heading,
                'image'=>$imageName,
                'sub_heading'=>$request->sub_heading,
                'paragraph'=>$request->paragraph,
                'author'=>$request->author,
                'author_title'=>$request->author_title
            ]);
            
            return redirect()->back()->with('success', 'Data Added Successfully');
        }

        public function editFinanceDepartmentData(Request $request){
            $request->validate([
                'main_heading'=>'required|string|min:3',
                'image'=>'required|image|mimes:png,jpg,jpeg',
                'sub_heading'=>'required|string|min:3',
                'paragraph'=>'required|string|min:3',
                'author'=>'required|string|min:3',
                'author_title'=>'required|string|min:3'
            ]);
    
            $id=$request->id;
    
            if(!empty($request->image)){
                $request->validate([
                   'image'=>'required|image|mimes:png,jpeg,jpg'
                ]);
    
                $imageName=time().'.'.$request->image->extension();
                $request->image->move(public_path('images'),$imageName);
    
                //update data
                FinanceDepartment::where(['id'=>$id])->update([
                    'main_heading'=>$request->main_heading,
                    'image'=>$imageName,
                    'sub_heading'=>$request->sub_heading,
                    'paragraph'=>$request->paragraph,
                    'author'=>$request->author,
                    'author_title'=>$request->author_title
                ]);
    
                return redirect()->back()->with('success', 'Data Updated Successfully');
            }
        }

        //method to delete data in the ictdepartment
    public function deleteFinanceDepartmentData(Request $request){
        $id=$request->id;
        FinanceDepartment::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }

}
