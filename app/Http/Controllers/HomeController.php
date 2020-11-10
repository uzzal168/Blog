<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

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

    public function editName(Request $request)
    {
        //get id and edited name
        $id = $request->input('id');
        $name = $request->input('name');
        
        //update name of the user
        try {
            DB::update('update users set name = ? where id = ?', [$name, $id]);
            return redirect('/home')->with('status',"Updated successfully");
        } catch (Exception $e) {
            return redirect('/home')->with('failed',"operation failed");
        }
    }
}
