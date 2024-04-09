<?php

namespace App\Http\Controllers\Admin\Resources;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\Company;
// use App\Models\Company;

use App\Models\{
    User,
    Company,
    CompanyNews
};

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Mail,Hash,File,Auth,DB,Helper,Exception,Session,Redirect;
use Carbon\Carbon;


class CompnayManagerController extends Controller
{
    // All Data
    public function index()
    {
        try {
            $companys = Company::orderBy('id','desc')->get();
            return view('admin.resources.company.index',compact('companys'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage);
        }
    }


    // Create Page
    public function create()
    {
        return view('admin.resources.company.add');
    }


    // Store Data
    public function store(Request $request){
        try {
            $request->validate([
                "name" => "required",
            ]);
            $data = $request->all();
            $userID = auth()->id();
            // Check company Exit Or not
            $Checkcompany = Company::where('companyname',  $request->name)->first();
            if(!empty($Checkcompany)){
                return back()->with("error",'Company Already Exists');
            }else{
                $datauser = [
                    'companyname' => $request->name,
                    'domain' => $request->website,
                    'uti_code' => $request->uti_code,
                    'senderid' => $request->senderid,
                    'smsusername' => $request->smsuser,
                    'smspassword' => $request->smspassword,
                ];

                Company::insertGetId($datauser);

                return redirect()->route('admin.resources.company.index')->with('success','Company Successfully Created.');
            }
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }



    // Delete Data
    public function delete($id)
    {
        try {
             // $deleted = Company::where('id', $id)->delete();
             Company::find($id)->delete();

            return response()->json(['success'=>'company Deleted Successfully!']);
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }


    // Status Data
    public function status(Request $request){

        try {
            $id = $request->id;
            $datauser = [
                'status' => $request->status,
            ];

            Company::where('id', $id)->update($datauser);


            return response()->json(['success'=>'company Status Changes Successfully!']);
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }


    // Edit Data
    public function edit($id){
        $company = Company::find($id);
        return view('admin.resources.company.edit',compact('company'));
    }


    // Update Data
    public function update(Request $request){
        try {
            $request->validate([
                "name" => "required",
            ]);
            $data = $request->all();
            $userID = auth()->id();

            $datauser = [
                'companyname' => $request->name,
                'domain' => $request->website,
                'uti_code' => $request->uti_code,
                'senderid' => $request->senderid,
                'smsusername' => $request->smsuser,
                'smspassword' => $request->smspassword,
            ];

            Company::where('id', $request->id)->update($datauser);

            return redirect()->route('admin.resources.company.index')->with('success','company Successfully Updated.');
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }


    // compnay profile Data
    public function compnay_profile($id){
        $company = Company::find($id);
        return view('admin.resources.company.company_profile',compact('company'));
    }


    // Compnay Profile Image Page
    public function compnay_image($id){
        $company = Company::find($id);
        return view('admin.resources.company.company_image',compact('company'));
    }

    // Company Profie Image Change Data
    public function profile_image(Request $request){
        try {
            $id = $request->profileid;

            if ($request->hasFile('profileimage')) {
                $file = $request->file('profileimage');
                $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

                // Create a folder if it doesn't exist
                $folderPath = 'companies/images/' . date('Y/m/') . $id;
                Storage::disk('public')->makeDirectory($folderPath, 0777, true, true);

                // Store the file
                $filepathimage = $file->storeAs($folderPath, $fileName, 'public');

                // Update the company profile
                $company = Company::findOrFail($id);
                $company->logo = 'storage/' . $filepathimage;
                $company->save();

                return back()->with('success', 'Company profile image updated successfully.');
            } else {
                return back()->with("error", "No file uploaded.");
            }
        } catch (\Throwable $th) {
            dd($th);
            return back()->with("error", $th->getMessage());
        }
    }


    // Compnay News Page
    public function compnay_news($id){
        $company = Company::find($id);
        $companynewsall = CompanyNews::where('company_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.resources.company.company_news',compact('company','companynewsall'));
    }


    // News Store Data
    public function news_store(Request $request){
        try {
            $request->validate([
                "news" => "required",
                "billnotices" => "required",
            ]);
            $data = $request->all();
            $userID = auth()->id();

            $datauser = [
                'news' => $request->news,
                'bill_notices' => $request->billnotices,
                'company_id' => $request->companyid,
            ];

            CompanyNews::insertGetId($datauser);

            return back()->with('success', 'Company News Added successfully.');
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }

    // Delete Data
    public function news_delete($id)
    {
        try {
             // $deleted = Company::where('id', $id)->delete();
             CompanyNews::find($id)->delete();

            return response()->json(['success'=>'Company News Deleted Successfully!']);
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }



     // Compnay notice Page
     public function compnay_notice($id){
        $company = Company::find($id);
        $companynewsall = CompanyNews::where('company_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.resources.company.company_notice',compact('company','companynewsall'));
    }

}
