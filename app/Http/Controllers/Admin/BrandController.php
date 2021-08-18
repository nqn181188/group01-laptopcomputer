<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $count = array();
        foreach($brands as$brand){
            $count["$brand->id"]=Product::where('brand_id',$brand->id)->count();
        }
        return view('admin.product.brand',compact(
            'brands',
            'count',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.insertbrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = $request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&&$extension!='jpeg'&&$extension!='png'){
                return back()->with('error', 'File upload must be have extension is jpg, jpeg or png.');
            }
            $imgName=$file->getClientOriginalName();
            $file->move('images/brands',$imgName);
            $brand['image']=$imgName;
        }
        Brand::create($brand);
        return back()->with('success', 'Brand'. $brand['brand'].' has been successfully inserted');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.product.updatebrand',compact(
            'brand',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->brand=$request->brand;
        if($request->hasFile('image')){
            
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&&$extension!='jpeg'&&$extension!='png'){
                $item=Brand::where('id',$id)->first();
                $erroUploadImage = 'Please choose the file with extension is jpg, jpeg or png';
                return redirect()->route('admin.brand.edit',$item)->with(
                    'erroUploadImage',
                );
            }
            $imgName=$file->getClientOriginalName();
            $file->move('images/brands',$imgName);
            $brand['image']=$imgName;
        }
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand){
            if($brand->image!=null){
                if(File::exists(public_path("images/brands/$brand->image"))){
                    File::delete(public_path("images/brands/$brand->image"));
                }
            }
            $brand->delete();
            return redirect()->route('admin.brand.index');
    }
}
