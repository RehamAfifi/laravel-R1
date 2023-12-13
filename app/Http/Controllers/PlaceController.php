<?php

namespace App\Http\Controllers;
use App\Models\Place;
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
    public function placesList(){
            //query-builder
         $places = DB::table('places')->where('deleted_at',null)->get();
            //Eloquent Model
            // $places=Place::get();
       return view('placesList',compact('places'));
    }

    public function show(){

    }
    public function create(){
       return view('createPlace');
    }
    

    public function store(Request $request){
        $messages= $this->messages();
        $data=$request->validate(['Title'=>'required|string',
        'description'=>'required|string|max:100',             
        'from'=>'required|numeric',
        'to'=>"required|numeric|min:{$request->input('from')}",
        'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        ],$messages);
        $fileName=$this->uploadFile($request->image,'assets/images');
        $data['image'] =$fileName;
         DB::table('places')->insert($data);
        return redirect('place');
    }
    public function messages(){
        return ['Title.required'=>'Title is required',
        'Title.string'=>'should be text',
         'description.required'=>'should be text',
         'from.required'=>'required','should be number','less than to' ,
        'to.min'=>'should be greater than from input',
        'to.required'=>'required',
        'image.required'=>'image is required'
    ];
}
public function destroy(string $id):RedirectResponse
{

//    DB::table('places')->where('id',$id)->delete();
    Place::where('id',$id)->delete();
    return redirect('placesList');
}
    public function trashedPlaces()
{
   $places =Place::onlyTrashed()->get();
    return view('trashedPlaces',compact('places'));
}
    public function delete(string $id):RedirectResponse
        {
    Place::where('id',$id)->ForceDelete();
    return redirect('placeList');
    }
public function restore(string $id):RedirectResponse
    {
   $places = Place::where('id',$id)->restore();
    return redirect('trashedPlaces');
    }

}
