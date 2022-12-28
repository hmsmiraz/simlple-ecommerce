<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products=Product::all();
        $products=Product::paginate(2);
        return view('backend.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name'=>['required','min:3'],
                'price'=>['required','min:2'],
                'discount'=>['required','min:2'],
                'details'=>['required','min:10']
            ]);

            Product::create([
                'name'=>$request->name,
                'details'=>$request->details,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'image'=>$this->uploadImage(request()->file('image'))
            ]);
            return redirect()->route('products.index')->withMessage('product add succesfully');

        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
            $request->validate([
                'name'=>['required','min:3'],
                'price'=>['required','min:2'],
                'discount'=>['required','min:2'],
                'details'=>['required','min:10']
            ]);

            $requestData = [
                'name'=>$request->name,
                'details'=>$request->details,
                'price'=>$request->price,
                'discount'=>$request->discount,
                //'image'=>$this->uploadImage(request()->file('image'))
            ];
    
            if($request->hasFile('image')){
                $requestData['image']=$this->uploadImage(request()->file('image'));
            }
            $product->update($requestData);
            return redirect()->route('products.index')->withMessage('product update succesfully');

        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function uploadImage($file){
        $fileName = time().'.'.$file->getClientOriginalExtension();
        'Image'::make($file)
        ->resize(200,200)
        ->save(storage_path().'/app/public/'.$fileName);
        return $fileName;
    }
}
