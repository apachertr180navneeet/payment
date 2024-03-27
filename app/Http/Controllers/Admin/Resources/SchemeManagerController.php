<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Scheme;
use Mail,Hash,File,Auth,DB,Helper,Exception,Session,Redirect;
use Carbon\Carbon;

class SchemeManagerController extends Controller
{
    // All Data
    public function index()
    {
        try {
            $schemes = Scheme::orderBy('id','desc')->get();
            return view('admin.resources.scheme.index',compact('schemes'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage);
        }
    }


    // Create Page
    public function create()
    {
        return view('admin.resources.scheme.add');
    }


    // Store Data
    public function store(Request $request){
        try {
            $request->validate([
                "name" => "required",
            ]);
            $data = $request->all();
            $userID = auth()->id();
            // Check Scheme Exit Or not
            $CheckScheme = Scheme::where('name',  $request->name)->first();
            if(!empty($CheckScheme)){
                return back()->with("error",'Scheme Already Exists');
            }else{
                // Scheme::create([
                //     "name" => $request->name,
                // ]);
                $datauser = [
                    'name' => $request->name,
                    'user_id' => $userID,
                ];

                Scheme::insertGetId($datauser);

                return redirect()->route('admin.resources.scheme.index')->with('success','Scheme Successfully Created.');
            }
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }



    // Delete Data
    public function delete($id)
    {
        try {
             // $deleted = Scheme::where('id', $id)->delete();
             Scheme::find($id)->delete();

            return response()->json(['success'=>'Scheme Deleted Successfully!']);
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

            Scheme::where('id', $id)->update($datauser);


            return response()->json(['success'=>'Scheme Status Changes Successfully!']);
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }


    // Edit Data
    public function edit($id){
        $scheme = Scheme::find($id);
        return view('admin.resources.scheme.edit',compact('scheme'));
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
                'name' => $request->name,
                'user_id' => $userID,
            ];

            Scheme::where('id', $request->id)->update($datauser);

            return redirect()->route('admin.resources.scheme.index')->with('success','Scheme Successfully Updated.');
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }
}
