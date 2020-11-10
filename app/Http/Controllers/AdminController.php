<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admin;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::select('select * from users');
        $admins = DB::select('select * from admins');
        return view('admin', ['users'=>$users], ['admins'=>$admins]);
    }

    //make admin from user
    public function makeAdmin(Request $request, $id){
        
        if (Auth::user()->name=='admin') {
            $userprofile = User::find($id);
            try{
                $admin = new Admin;
                $admin->name = $userprofile->name;
                $admin->email = $userprofile->email;
                $admin->password = $userprofile->password;
                
                $admin->save();
                return redirect('/admin')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('/admin')->with('failed',"operation failed");
            }
        }

        return redirect('/admin')->with('status',"Can't make admin. You are not super admin");
    }

    //remove admin from admin table
    public function removeAdmin(Request $request, $id){

        if (Auth::user()->name=='admin') {
            try{
                Admin::destroy($id);
                return redirect('/admin')->with('status',"Admin remove successfully");
            }
            catch(Exception $e){
                return redirect('/admin')->with('failed',"operation failed");
            }
        }

        return redirect('/admin')->with('status',"Can't remove admin. You are not super admin");
    }

}
