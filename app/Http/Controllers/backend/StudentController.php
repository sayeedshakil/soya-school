<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$students = Student::with('studentclass')->get();
        $students=Student::get();
        return view('backend.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $students = Student::get();
        $classes=Studentclass::all()->pluck('name','id');
        return view('backend.student.create', compact('students','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest  $request)
    {
       abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('studentImage')) {
            $filename = time() . '_' . $request->file('studentImage')->getClientOriginalName();
            $request->file('studentImage')->storeAs('images/students', $filename, 'public');
            //dd($student);
        }


        $student = Student::create([
            'studentId' => $request->studentId,
            'fName' => $request->fName,
            'lName' => $request->lName,
            'studentImage' => $filename ?? null,
            'admissionNumber' => $request->admissionNumber,
            'admissionDate' => $request->admissionDate,
            'gender' => $request->gender,
            'rollNumber' => $request->rollNumber,
            'dateOfBirth' => $request->dateOfBirth,
            'religion' => $request->religion,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fatherName' => $request->fatherName,
            'fatherMobile' => $request->fatherMobile,
            'fatherOccupation' => $request->fatherOccupation,
            'motherName' => $request->motherName,
            'motherMobile' => $request->motherMobile,
            'motherOccupation'=>$request->motherOccupation,
            'studentclass_id'     =>$request->studentclass
        ]);


        return redirect(route('backend.students.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.students.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        abort_if(Gate::denies('studentile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->load('studentclass');

        return view('backend.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $classes=Studentclass::all()->pluck('name','id');
        return view('backend.student.edit', compact('student','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('studentImage')) {
            Storage::delete('public/images/students/' . $student->studentImage);

            $filename = time() . '_' . $request->file('studentImage')->getClientOriginalName();
            $request->file('studentImage')->storeAs('images/students/', $filename, 'public');
        }
        $student->update([

            'fName' => $request->fName,
            'lName' => $request->lName,
            'studentImage' => $filename ?? $student->studentImage,
            'admissionDate' => $request->admissionDate,
            'gender' => $request->gender,
            'rollNumber' => $request->rollNumber,
            'dateOfBirth' => $request->dateOfBirth,
            'religion' => $request->religion,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fatherName' => $request->fatherName,
            'fatherMobile' => $request->fatherMobile,
            'fatherOccupation' => $request->fatherOccupation,
            'motherName' => $request->motherName,
            'motherMobile' => $request->motherMobile,
            'motherOccupation'=>$request->motherOccupation,
            'studentclass_id'     =>$request->studentclass
        ]);
        return redirect()->route('backend.students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($student->studentImage) {
            Storage::delete('public/images/students/' . $student->studentImage);
        }

        $student->delete();

        return redirect()->route('backend.students.index');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request = Student::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
