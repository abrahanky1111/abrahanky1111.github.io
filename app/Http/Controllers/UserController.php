<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function index() {

        $users = User::get();
        return view('welcome',compact("users"));

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request,User $user)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $user->image = $filename;
        }
        $user->descripcion = $request->descripcion;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->specialty=$request->specialty;
        $user->programs=$request->programs;
        $user->experience=$request->experience;
        $user->date=$request->date;
        $user->save();

       
        //$user = Auth::user();
        return view('home',compact("user"));
    }
}
