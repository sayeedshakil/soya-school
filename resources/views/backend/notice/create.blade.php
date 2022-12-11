@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    @if (session('successMessage'))
    <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
    @else
    {{ trans('global.create') }} {{ trans('cruds.notice.title_singular') }}
    @endif
    </div>


    <div class="card-body">
        <form action="{{ route('backend.notices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.notice.notice_title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.notice.description') }}*</label>
                {{-- <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" required> --}}
                <textarea id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" >{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('category') ? 'is-invalid' : '' }}" for="category">{{ trans('cruds.post.fields.category_select') }}*
                   </label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category') == $id ? 'selected' : '' }}>{{ $category }} </option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.category_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('studentclass') ? 'has-error' : '' }}">
                <label class="{{ $errors->has('studentclass') ? 'is-invalid' : '' }}" for="studentclass">{{ trans('cruds.student.class') }}*</label>
                <select name="studentclass" id="studentclass" class="form-control" required>
                    <option value="">Select Class</option>
                    @foreach($classes as $id =>$entry)
                        <option value="{{ $id }}" {{ old('studentclass') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach

                </select>
                @if($errors->has('studentclass'))
                    <em class="invalid-feedback">
                        {{ $errors->first('studentclass') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.category_helper') }}
                </p>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">{{ trans('cruds.notice.attachment') }}</label>
                <input class="form-control" name="attachment" type="file" id="formFile">
                {{-- @if($errors->has('attachment'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </em>
                @endif --}}
                @error('attachment')<div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                <div class="mt-2">
                    <div class="text-muted" style="font-size: .80rem;">
                        Supported file type pdf,docx,jpg,jpeg <br>Maximum file size is 5MB
                    </div>
                </div>
            </div>


            {{-- <label for="attachment">{{ trans('cruds.notice.attachment') }}</label>
            <div class="form-group text-center" {{ $errors->has('attachment') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add attachment" title="click here to add attachment">
                    <input type="file" class="form-control" name="attachment" id="profileImage" style="display: none;"
                        onchange="preview(this)" class="@error('attachment') is-invalid @enderror" >
                    @error('attachment')<div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mt-2">
                    <label class="font-weight-bold text-dark" for="">Click to Choose Attachment</label>
                    <div class="text-muted" style="font-size: .80rem;">
                        Supported file type pdf,dox,jpg,jpeg <br>Maximum file size is 5MB
                    </div>
                </div>
            </div> --}}





            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>



@endsection
