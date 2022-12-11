<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\FrontPageStoreRequest;
use App\Http\Requests\backend\FrontPageUpdateRequest;
use App\Models\FrontPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('site_configuration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $frontPages = FrontPage::all();

        return view('backend.frontPage.index', compact('frontPages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.frontPage.create');
    }

    /**
     * @param \App\Http\Requests\backend\FrontPageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrontPageStoreRequest $request)
    {
        abort_if(Gate::denies('site_configuration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('headTeacherImage')) {
            $filename = time() .'_'.$request->file('headTeacherImage')->getClientOriginalName();
            $request->file('headTeacherImage')->storeAs('images/teachers', $filename, 'public');
        }

        $frontPage = FrontPage::create([
            'headTeacherImage'     =>$filename ?? null,
            'headerNameEn'     =>$request->headerNameEn,
            'headerNameBn'     =>$request->headerNameBn,
            'headTeacherName'     =>$request->headTeacherName,
            'latestNewsText'     =>$request->latestNewsText
        ]);

        // $request->session()->flash('frontPage.id', $frontPage->id);

        return redirect()->route('backend.front-page.create')->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.front-page.index').'">View All</a>');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrontPage $frontPage
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FrontPage $frontPage)
    {
        abort_if(Gate::denies('site_configuration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.frontPage.show', compact('frontPage'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrontPage $frontPage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FrontPage $frontPage)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.frontPage.edit', compact('frontPage'));
    }

    /**
     * @param \App\Http\Requests\backend\FrontPageUpdateRequest $request
     * @param \App\Models\FrontPage $frontPage
     * @return \Illuminate\Http\Response
     */
    public function update(FrontPageUpdateRequest $request, FrontPage $frontPage)
    {
        abort_if(Gate::denies('site_configuration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $frontPage->update($request->validated());
        if ($request->has('headTeacherImage')) {
            Storage::delete('public/images/teachers/' . $frontPage->headTeacherImage);

            $filename = $request->title . '_' .time() .'_'.$request->file('headTeacherImage')->getClientOriginalName();
            $request->file('headTeacherImage')->storeAs('images/teachers/', $filename, 'public');
        }

        $frontPage->update([
            'headTeacherImage'     =>$filename ?? $frontPage->headTeacherImage,
            'headerNameEn'     =>$request->headerNameEn,
            'headerNameBn'     =>$request->headerNameBn,
            'headTeacherName'     =>$request->headTeacherName,
            'latestNewsText'     =>$request->latestNewsText,
            'is_active'     =>$request->is_active
        ]);

        // $request->session()->flash('frontPage.id', $frontPage->id);

        return redirect()->route('backend.front-page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrontPage $frontPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FrontPage $frontPage)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($frontPage->headTeacherImage) {
            Storage::delete('public/images/teachers/' . $frontPage->headTeacherImage);
        }
        $frontPage->delete();

        return redirect()->route('backend.front-page.index');
    }
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('site_configuration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        FrontPage::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
