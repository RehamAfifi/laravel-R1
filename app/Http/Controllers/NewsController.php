<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns=['auther','title','content','published'];
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
        // $news=new News;
        // $news->auther=$request->auther;
        // $news->title=$request->title;
        // $news->content=$request->content;
        // if(isset($request->published)){
        //     $news->published=true;
        // }else{
        //     $news->published=false;
        // }
        // $news->save();
        $request->validate(['auther'=>'required|string|max:30',
        'title'=>'required|string|max:60',
        'content'=>'required|string|max:250'
        ]);
        $request1 = $request->only($this->columns);
        $request1['published'] = isset($request1['published'])? true:false;
          News::create($request1);
         return redirect('news');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $onews=News::findOrFail($id);
        return view('showNews',compact('onews'));
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
        $request1 = $request->only($this->columns);
        $request1['published'] = isset($request1['published'])? true:false;
        News::where('id',$id)->update($request1);
        return redirect()->route('news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::where('id',$id)->delete();
        return redirect()->route('news');
    }
    public function trashedNews()
    {
       $news =News::onlyTrashed()->get();
        return view('trashedNews',compact('news'));
    }
    public function delete(string $id):RedirectResponse
    {
        News::where('id',$id)->ForceDelete();
        return redirect('news');
    }
    public function restore(string $id):RedirectResponse
    {
       $onews = News::where('id',$id)->restore();
        return redirect('news');
    }
}
