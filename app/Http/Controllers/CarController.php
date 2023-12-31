<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
 use Illuminate\Http\RedirectResponse;
use App\Traits\Common;
class CarController extends Controller

{
    use Common;
     private $columns=['carTitle','description','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::get();
        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::select('id','categoryName')->get();
        return view('addCar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=['carTitle.required'=>__('messages.requiredmsg'),
         'description.required'=>'should be text',
       ];
        $data=$request->validate(
        ['category_id'=>'exists:categories,id',
        'carTitle'=>'required|string',
        'description'=>'required|string|max:100',
        'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        'price'=>'required','numeric'
        ],$messages);
     
        $data['published'] = isset($request['published']);
        $fileName=$this->uploadFile($request->image,'assets/images');
        $data['image'] =$fileName;
          Car::create($data);
        return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car=Car::findOrFail($id);
        return view('showCar',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $car=Car::findOrFail($id);
         $categories=Category::findOrFail([1,2],['id','categoryName']);
        return view('editCar',compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {

        $messages=['carTitle.required'=>__('messages.required'),
        'description.required'=>'should be text',
       'price'=>'required'];
        $data=$request->validate([
        'category_id'=>'exists:App\Models\Category,id',
        'carTitle'=>'required|string',
        'description'=>'required|string|max:100',
        'image'=>'nullable|mimes:png,jpg,jpeg|max:2048',
        'price'=>'required','numeric',
       ],$messages);

       $data['published'] = isset($request['published']);
       if(isset($request->image)){
         $data['image']=$request['image'];
         $fileName= $this->uploadFile($request->image,'assets/images');
         $data['image'] =$fileName;
       }
       Car::where('id',$id)->update($data);
       return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Car::where('id',$id)->delete();
        return redirect('cars');
    }
    public function trashed()
    {
       $cars =Car::onlyTrashed()->get();
        return view('trashed',compact('cars'));
    }
    public function delete(string $id):RedirectResponse
    {
        Car::where('id',$id)->ForceDelete();
        return redirect('cars');
    }
    public function restore(string $id):RedirectResponse
    {
       $cars = Car::where('id',$id)->restore();
        return redirect('cars');
    }
}
