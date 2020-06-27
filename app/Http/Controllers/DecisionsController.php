<?php

namespace App\Http\Controllers;

use App\Decision;
use App\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DecisionsController extends Controller
{
  public function getAllDecisions(){
      return view('view.decisions')->with('decisions',Decision::all())->with('wilayas',Wilaya::all());


  }
  public function getMyDecisions(){

      return view('view.mydecisions')->with('mydecisions',Decision::where('user_id',Auth::id())->get())->with('wilayas',Wilaya::all());

  }
    public function store(Request $request)
    {
        $this->validate($request,[
                'title'=>'required'
                ,'value'=>'required',
                'wilaya_id'=>'required',


            ]
        );

        $decision=new Decision();
        $decision->user_id=Auth::id();
        $decision->wilaya_id=$request->wilaya_id;
        $decision->content=$request->value;
        $decision->title=$request->title;
        $decision->save();
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $this->validate($request,[
                'title'=>'required'
                ,'value'=>'required',
                'wilaya_id'=>'required',
                'id'=>'required'


            ]
        );

        $decision=Decision::find($request->id);
        $decision->title=$request->title;
        $decision->content=$request->value;
        $decision->user_id=Auth::id();
        $decision->wilaya_id=$request->wilaya_id;
        $decision->save();

        return  redirect()->back();
    }
    public function delete($id){

        $decision=Decision::find($id);
        $decision->delete();

        return redirect()->back();



    }


}
