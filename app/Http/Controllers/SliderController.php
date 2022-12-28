<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('backend.sliders.index',['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
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
                'slider_title'=>['required','min:3']
            ]);

            $requestData = [
                'slider_title'=>$request->slider_title,
            ];
            $requestData['slider_status']= $request->boolean('slider_status');
            // if($request->has('slider_status')){
            //     $requestData['slider_status'] = true;
            // }else{
            //     $requestData['slider_status'] = false;
            // }
            if($request->hasFile('slider_image')){
                $requestData['slider_image']=$this->uploadImage(request()->file('slider_image'));
            }

            Slider::create($requestData);
            return redirect()->route('sliders.index')->withMessage('slider added succesfully');

        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('backend.sliders.show',[
            'slider'=>$slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit',[
            'slider'=>$slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        try{
            $request->validate([
                'slider_title'=>['required','min:3']
            ]);

            $requestData = [
                'slider_title'=>$request->slider_title,
            ];
            $requestData['slider_status']= $request->boolean('slider_status');
            // if($request->has('slider_status')){
            //     $requestData['slider_status'] = true;
            // }else{
            //     $requestData['slider_status'] = false;
            // }
            if($request->hasFile('slider_image')){
                $requestData['slider_image']=$this->uploadImage(request()->file('slider_image'));
            }

            $slider->update($requestData);
            return redirect()->route('sliders.index')->withMessage('slider added succesfully');

        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    public function uploadImage($file){
        $fileName = time().'.'.$file->getClientOriginalExtension();
        'Image'::make($file)
        ->resize(200,200)
        ->save(storage_path().'/app/public/'.$fileName);
        return $fileName;
    }
}
