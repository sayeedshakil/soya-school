<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers=Teacher::get();
        return view('backend.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $teachers = Teacher::get();
        return view('backend.teacher.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        abort_if(Gate::denies('teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('teacherImage')) {
            $filename = time() . '_' . $request->file('teacherImage')->getClientOriginalName();
            $request->file('teacherImage')->storeAs('images/teachers', $filename, 'public');
            //dd($student);
        }


        $teacher = Teacher::create([
            'teacherId' => $request->teacherId,
            'fName' => $request->fName,
            'lName' => $request->lName,
            'teacherImage' => $filename ?? null,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fatherName' => $request->fatherName,
            'motherName' => $request->motherName,
            'designation' => $request->designation,
            'qualification' => $request->qualification,
            'contractType' => $request->contractType,
            'joinDate' => $request->joinDate,
            'maritalStatus' => $request->maritalStatus,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'twitter_link' => $request->twitter_link,
            'website_link' => $request->website_link
        ]);


        return redirect(route('backend.teachers.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.teachers.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        abort_if(Gate::denies('teacherile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $teacher->load('studentclass');

        return view('backend.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $classes=Studentclass::all()->pluck('name','id');
        return view('backend.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('teacherImage')) {
            Storage::delete('public/images/teachers/' . $teacher->teacherImage);

            $filename = time() . '_' . $request->file('teacherImage')->getClientOriginalName();
            $request->file('teacherImage')->storeAs('images/teachers/', $filename, 'public');
        }
        $teacher->update([

            'fName' => $request->fName,
            'lName' => $request->lName,
            'teacherImage' => $filename ?? $teacher->teacherImage,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fatherName' => $request->fatherName,
            'motherName' => $request->motherName,
            'designation' => $request->designation,
            'qualification' => $request->qualification,
            'contractType' => $request->contractType,
            'joinDate' => $request->joinDate,
            'maritalStatus' => $request->maritalStatus,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'twitter_link' => $request->twitter_link,
            'website_link' => $request->website_link
        ]);
        return redirect()->route('backend.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        abort_if(Gate::denies('teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($teacher->teacherImage) {
            Storage::delete('public/images/teachers/' . $teacher->teacherImage);
        }

        $teacher->delete();

        return redirect()->route('backend.teachers.index');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request = Teacher::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
