<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Category;
use App\Models\Notice;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('notice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $notice = Notice::with('category','studentclass')->get();
        return view('backend.notice.index',compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $classes=Studentclass::all()->pluck('name','id');
        $categories = Category::get()->pluck('name','id');
        return view('backend.notice.create',compact('classes','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('attachment')) {
            $filename = $request->title . '_' .time() .'_'.$request->file('attachment')->getClientOriginalName();
            //$filename = time() . '_' . $request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->storeAs('images/attachment', $filename, 'public');
        }
        // dd($filename);

        Notice::create([
            'title'     =>$request->title,
            'description'     =>$request->description,
            'attachment'     =>$filename ?? null,
            'category_id' => $request->category,
            'studentclass_id'     =>$request->studentclass
        ]);
        return redirect(route('backend.notices.create'))->with('successMessage', 'Data stored successfully!<a class="btn btn-sm btn-info ml-2" href="'.route('backend.notices.index').'">View All</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        abort_if(Gate::denies('notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $classes=Studentclass::all()->pluck('name','id');
        $categories = Category::all()->pluck('name','id');
        return view('backend.notice.edit',compact('notice','classes','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        abort_if(Gate::denies('notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->has('attachment')) {
            Storage::delete('public/images/attachment/' . $notice->attachment);

            $filename = $request->title . '_' .time() .'_'.$request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->storeAs('images/attachment/', $filename, 'public');
        }

        $notice->update([
            'title'     =>$request->title,
            'description'     =>$request->description,
            'is_active'     =>$request->is_active,
            'attachment'     =>$filename ?? $notice->attachment,
            'category_id' => $request->category,
            'studentclass_id'     =>$request->studentclass
        ]);

        return redirect(route('backend.notices.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($notice->attachment) {
            Storage::delete('public/images/attachment/' . $notice->attachment);
        }
            $notice->delete();
            return redirect(route('backend.notices.index'));
    }


    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // if ($notice->attachment) {
        //     $files = Notice::whereIn('id',request('ids'));
        //     foreach ($files as $file) {
        //         Storage::delete('public/images/attachment/' . $file->attachment);
        //         $file->delete();
        //     }

        // }
        Notice::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
