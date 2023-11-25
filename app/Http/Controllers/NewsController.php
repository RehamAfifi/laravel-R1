<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::get();
        return view('News',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news=new News;
        $news->auther=$request->auther;
        $news->title=$request->title;
        $news->content=$request->content;
        if(isset($request->published)){
            $news->published=true;
        }else{
            $news->published=false;
        }
        $news->save();
         return "news added succefully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $onews=News::findOrFail($id);
        return view('editNews',compact('onews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
