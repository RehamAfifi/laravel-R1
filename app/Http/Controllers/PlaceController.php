<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\Common;
class PlaceController extends Controller
{
    use Common;
    public function index(){
        $places = DB::table('places')->orderByDesc('id')->limit(6)->get();
       return view('place',compact('places'));
    }

    public function show(){

    }
    public function create(){
       return view('createPlace');
    }
    

    public function store(Request $request){
        $messages=['Title.required'=>'Title is required',
         'description.required'=>'should be text',
        'from'=>'required',
        'to'=>'required',
    ];
        $data=$request->validate(['Title'=>'required|string',
        'description'=>'required|string|max:100',
        'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        'from'=>'required','numeric',
        'to'=>'required','numeric',
        ],$messages);
        $fileName=$this->uploadFile($request->image,'assets/images');
        $data['image'] =$fileName;
         DB::table('places')->insert($data);
        return redirect('place');
    }

}
