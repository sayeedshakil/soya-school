<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMainSliderRequest;
use App\Http\Requests\UpadateMainSliderRequest;
use App\Models\MainSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('site_configuration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $slider = MainSlider::all();
        return view('backend.mainSlider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.mainSlider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainSliderRequest $request)
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd(request());
        if ($request->has('sliderImage')) {
            $filename = time() .'_'.$request->file('sliderImage')->getClientOriginalName();
            $request->file('sliderImage')->storeAs('images/mainSlider', $filename, 'public');
        }
        // dd($filename);

        MainSlider::create([
            'sliderImage'     =>$filename ?? null,
        ]);
        return redirect(route('backend.mainSliders.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.mainSliders.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function show(MainSlider $mainSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(MainSlider $mainSlider)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.mainSlider.edit',compact('mainSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function update(UpadateMainSliderRequest $request, MainSlider $mainSlider)
    { //dd($mainSlider);
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('sliderImage')) {
            Storage::delete('public/images/mainSlider/' . $mainSlider->sliderImage);

            $filename = time() .'_'.$request->file('sliderImage')->getClientOriginalName();
            $request->file('sliderImage')->storeAs('images/mainSlider/', $filename, 'public');
        }

        $mainSlider->update([
            'is_active'     =>$request->is_active,
            'sliderImage'     =>$filename ?? $mainSlider->sliderImage
        ]);

        return redirect(route('backend.mainSliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainSlider $mainSlider)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($mainSlider->sliderImage) {
            Storage::delete('public/images/mainSlider/' . $mainSlider->sliderImage);
        }
            $mainSlider->delete();
            return redirect(route('backend.mainSliders.index'));
    }

    public function massDestroy(MainSlider $mainSlider)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // if ($notice->attachment) {
        //     $files = Notice::whereIn('id',request('ids'));
        //     foreach ($files as $file) {
        //         Storage::delete('public/images/attachment/' . $file->attachment);
        //         $file->delete();
        //     }

        // }
        MainSlider::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
