<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
public function read(){
    $title=$_POST["title"];
    $price=$_POST["price"];
    $description=$_POST["description"];
    if(isset($_POST["published"])){
    $published_str="published";}
    else{
        $published_str="unpublished";  
    }
    return view('details',compact('title','price','description','published_str'));
}
}
