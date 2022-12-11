<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $class = Studentclass::all();
        return view('backend.class.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data= $request->validate([
            'name' => 'required|unique:studentclasses',
        ]);
        Studentclass::create($data);

        return redirect(route('backend.studentclasses.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.studentclasses.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function show(Studentclass $studentclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Studentclass $studentclass)
    {
        abort_if(Gate::denies('class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.class.edit',compact('studentclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studentclass $studentclass)
    {
        abort_if(Gate::denies('class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data= $request->validate([
            'name' => 'required',
        ]);
        $studentclass->update($data);
        return redirect(route('backend.studentclasses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studentclass  $studentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studentclass $studentclass)
    {
        abort_if(Gate::denies('class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($studentclass->students()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, There are Students who are reading in this class.']);
        }else{
            $studentclass->delete();
            return redirect(route('backend.studentclasses.index'));
        }
    }
    public function massDestroy(Studentclass $studentclass)
    {
        abort_if(Gate::denies('class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($studentclass->students()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, There are Students who are reading in this class.']);
        }else{
            Studentclass::whereIn('id', request('ids'))->delete();
        }
        return response()->noContent();
    }
}
