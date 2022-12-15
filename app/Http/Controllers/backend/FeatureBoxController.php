<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureBoxRequest;
use App\Http\Requests\UpdateFeatureBoxRequest;
use App\Models\FeatureBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FeatureBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('site_configuration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $featureBox=FeatureBox::get();
        return view('backend.featureBox.index', compact('featureBox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.featureBox.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeatureBoxRequest $request)
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('feature_image')) {
            $filename = time() . '_' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->storeAs('images/featureBox', $filename, 'public');

        }


        $FeatureBox = FeatureBox::create([
            'feature_title' => $request->feature_title,
            'feature_image' => $filename ?? null,
            'feature_subtitle1' => $request->feature_subtitle1,
            'feature_subtitle2' => $request->feature_subtitle2,
            'feature_subtitle3' => $request->feature_subtitle3,
            'feature_subtitle_link1' => $request->feature_subtitle_link1,
            'feature_subtitle_link2' => $request->feature_subtitle_link2,
            'feature_subtitle_link3' => $request->feature_subtitle_link3
        ]);


        return redirect(route('backend.feature_box.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.feature_box.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeatureBox  $featureBox
     * @return \Illuminate\Http\Response
     */
    public function show(FeatureBox $featureBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeatureBox  $featureBox
     * @return \Illuminate\Http\Response
     */
    public function edit(FeatureBox $featureBox)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.featureBox.edit',compact('featureBox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeatureBox  $featureBox
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeatureBoxRequest $request, FeatureBox $featureBox)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //dd($request);
        if ($request->has('feature_image')) {
            Storage::delete('public/images/featureBox/' . $featureBox->feature_image);

            $filename = time() . '_' . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->storeAs('images/featureBox/', $filename, 'public');
        }
        $featureBox->update([
            'feature_title' => $request->feature_title,
            'is_active' => $request->is_active,
            'feature_image' => $filename ?? $featureBox->feature_image,
            'feature_subtitle1' => $request->feature_subtitle1,
            'feature_subtitle2' => $request->feature_subtitle2,
            'feature_subtitle3' => $request->feature_subtitle3,
            'feature_subtitle_link1' => $request->feature_subtitle_link1,
            'feature_subtitle_link2' => $request->feature_subtitle_link2,
            'feature_subtitle_link3' => $request->feature_subtitle_link3

        ]);
        return redirect()->route('backend.feature_box.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeatureBox  $featureBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeatureBox $featureBox)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($featureBox->feature_image) {
            Storage::delete('public/images/featureBoxs/' . $featureBox->feature_image);
        }

        $featureBox->delete();

        return redirect()->route('backend.feature_box.index');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request = FeatureBox::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
