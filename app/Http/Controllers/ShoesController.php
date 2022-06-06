<?php

namespace App\Http\Controllers;

use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\support\Facades\File;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shoes=Shoes::all();
        return view('admin.indexshoes',compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createshoes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // return $request;
         //upload request
         $file_extension = $request->photo->getClientOriginalExtension();
         $file_name = time() . '.' . $file_extension;
         $path = 'upload_shoes';
         $request->photo->move($path, $file_name);
         Shoes::create([
             'picture' => $file_name,
             'name' => $request->name,
             'price'=>$request->price,
             'description'=>$request->description,
         ]);
         return redirect()->back()->with('addshoes', 'product Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shoes = Shoes::find($id);
        $img_destination = 'upload_shoes/'. $shoes->picture;
        
        if (File::exists($img_destination)) {
            File::delete($img_destination);
        }
        $shoes->delete();
        return redirect()->back();
    }
    public function shoespage(){
        $shoes=Shoes::all();
        return view('user.shoes',compact('shoes'));
    }
    public function showShoes(){
       // return "done";
       $shoes=Shoes::all();
       return redirect()->back()->with('showshoes',$shoes );
    }
}
