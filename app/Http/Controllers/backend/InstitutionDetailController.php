<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\InstitutionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class InstitutionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('site_configuration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $institutionDetail=InstitutionDetail::get();
        return view('backend.institutionDetails.index', compact('institutionDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.institutionDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('aboutus_image')) {
            $filename = time() . '_' . $request->file('aboutus_image')->getClientOriginalName();
            $request->file('aboutus_image')->storeAs('images/siteImage', $filename, 'public');
            //dd($institutionDetails);
        }


        $institutionDetails = InstitutionDetail::create([
            'aboutus_title' => $request->aboutus_title,
            'aboutus_description' => $request->aboutus_description,
            'aboutus_image' => $filename ?? null,
            'contactus_school_name' => $request->contactus_school_name,
            'contactus_address' => $request->contactus_address,
            'contactus_mobile' => $request->contactus_mobile,
            'contactus_telephone' => $request->contactus_telephone,
            'contactus_email' => $request->contactus_email
        ]);


        return redirect(route('backend.institution_details.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.institution_details.index').'">View All</a>');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstitutionDetail  $institutionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InstitutionDetail $institutionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstitutionDetail  $institutionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(InstitutionDetail $institutionDetail)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.institutionDetails.edit',compact('institutionDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstitutionDetail  $institutionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstitutionDetail $institutionDetail)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('aboutus_image')) {
            Storage::delete('public/images/siteImage/' . $institutionDetail->aboutus_image);

            $filename = time() . '_' . $request->file('aboutus_image')->getClientOriginalName();
            $request->file('aboutus_image')->storeAs('images/siteImage/', $filename, 'public');
        }
        $institutionDetail->update([
            'aboutus_title' => $request->aboutus_title,
            'is_active' => $request->is_active,
            'aboutus_description' => $request->aboutus_description,
            'aboutus_image' => $filename ?? $institutionDetail->aboutus_image,
            'contactus_school_name' => $request->contactus_school_name,
            'contactus_address' => $request->contactus_address,
            'contactus_mobile' => $request->contactus_mobile,
            'contactus_telephone' => $request->contactus_telephone,
            'contactus_email' => $request->contactus_email
        ]);
        return redirect()->route('backend.institution_details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstitutionDetail  $institutionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstitutionDetail $institutionDetail)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($institutionDetail->aboutus_image) {
            Storage::delete('public/images/institutionDetailss/' . $institutionDetail->aboutus_image);
        }

        $institutionDetail->delete();

        return redirect()->route('backend.institution_details.index');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request = InstitutionDetail::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
