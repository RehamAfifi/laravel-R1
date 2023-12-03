<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
 use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
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
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars=new Car;
        // $cars->carTitle=$request->carTitle;
        // $cars->description=$request->description;
        // if(isset($request->published)){
        //     $cars->published=true;
        // }else{
        //     $cars->published=false;
        // }
        // $cars->save();
        $request->validate(['carTitle'=>'required|string',
        'description'=>'required|string|max:100',
        ]);
        $request1 = $request->only($this->columns);
        $request1['published'] = isset($request1['published'])? true:false;
          Car::create($request1);
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
        return view('editCar',compact('car'));
        // return "The id is " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request1 = $request->only($this->columns);
        $request1['published'] = isset($request1['published'])? true:false;
        Car::where('id',$id)->update($request1);
        return redirect()->route('index');
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
