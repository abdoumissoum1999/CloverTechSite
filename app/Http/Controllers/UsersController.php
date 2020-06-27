<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

   public function getAllUser(){

       return view('view.tables')->with('admins',User::all());

   }
   public function Myprofile(){

       return view('view.user')->with('user',User::find(Auth::id()));

   }
   public function update(Request $request){
       $this->validate($request,[
               'name'=>'required',

               'grade'=>'required',



           ]
       );

       $user=User::find(Auth::id());
       $user->name=$request->name;
       $user->grade=$request->grade;
       $user->save();

       return  redirect()->back();



   }



}
