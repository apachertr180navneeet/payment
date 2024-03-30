<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
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


    // View Data
    public function view($id){
        $company = Company::find($id);
        return view('admin.resources.company.view',compact('company'));
    }
}
