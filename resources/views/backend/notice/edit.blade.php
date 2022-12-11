@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.class.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('backend.notices.update', [$notice->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.notice.notice_title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($notice) ? $notice->title : '') }}" required>
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
                <textarea id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" >{{ old('description', isset($notice) ? $notice->description : '') }}</textarea>
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
                        @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category') ? old('category') : $notice->category_id ?? '') == $id ? 'selected' : '' }} >{{ $entry}}</option>
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
                    @foreach($classes as $id => $entry)
                                <option value="{{ $id }}" {{ (old('studentclass') ? old('studentclass') : $notice->studentclass_id ?? '') == $id ? 'selected' : '' }} >{{ $entry}}</option>
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
                <label for="formFile" class="form-label">{{ trans('cruds.notice.attachment') }}:- <span class="text-info">{{$notice->attachment}}</span> </label>

                <input class="form-control" name="attachment" type="file" id="formFile"  value="{{ old('attachment') }}">
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

            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">{{ trans('cruds.post.fields.is_active')}}
                </label>
                <select name="is_active" id="is_active" class="form-control" required>

                        <option value="{{ 0 }}" @if (0 == $notice->is_active) selected @endif>{{ 'In-Active' }}</option>
                        <option value="{{ 1 }}" @if (1 == $notice->is_active) selected @endif>{{ 'Active' }}</option>

                </select>
                    @if($errors->has('is_active'))
                        <em class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </em>
                    @endif
                <p class="helper-block">
                    {{ trans('cruds.post.fields.category_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
