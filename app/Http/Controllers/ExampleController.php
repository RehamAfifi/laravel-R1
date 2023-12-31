<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
class ExampleController extends Controller
{
    use Common;
    public function test(){
        return view('login');
    }

    public function showUpload(){
        return view('upload');
    }
   public function place(){
        return view('place');
    }
    public function blog(){
        return view('blog');
    }
    public function upload(Request $request){
//    $file_extension = $request->image->getClientOriginalExtension();
//         $file_name = time() . '.' . $file_extension;
//         $path = 'assets/images';
//         $request->image->move($path, $file_name);
   $h=$this->uploadFile($request->image,'assets/images');
        return $h;
        // return dd($request->image);
    }
    public function testSession(){
        session()->put('test', 'First Laravel session');
        $data = session('test');
        return view('test',compact('data'));
    }

}
