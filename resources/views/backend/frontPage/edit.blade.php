@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }}
    </div>

    <div class="card-body">
        <form action="{{ route('backend.front-page.update', [$frontPage->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('headerNameEn') ? 'has-error' : '' }}">
                <label for="headerNameEn">{{ trans('cruds.frontPage.headerNameEn') }}*</label>
                <input type="text" id="headerNameEn" name="headerNameEn" class="form-control" value="{{ old('headerNameEn', isset($frontPage) ? $frontPage->headerNameEn : '') }}" required>
                @if($errors->has('headerNameEn'))
                    <em class="invalid-feedback">
                        {{ $errors->first('headerNameEn') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('headerNameBn') ? 'has-error' : '' }}">
                <label for="headerNameBn">{{ trans('cruds.frontPage.headerNameBn') }}*</label>
                <input type="text" id="headerNameBn" name="headerNameBn" class="form-control" value="{{ old('headerNameBn', isset($frontPage) ? $frontPage->headerNameBn : '') }}" required>
                @if($errors->has('headerNameBn'))
                    <em class="invalid-feedback">
                        {{ $errors->first('headerNameBn') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <label for="studentImage">{{ trans('cruds.frontPage.headTeacherImage') }}</label>
            <div class="form-group text-center" {{ $errors->has('headTeacherImage') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    @if($frontPage->headTeacherImage)
                        <img src="{{asset('storage/images/teachers/' . $frontPage->headTeacherImage)}}" onclick="triggerClick()" style="max-height:180px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                        <input type="file" name="headTeacherImage" id="profileImage" style="display: none;"
                            onchange="preview(this)" class="@error('headTeacherImage') is-invalid @enderror" >
                        @error('headTeacherImage')<div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <label class="font-weight-bold text-dark" for="">Click to Change</label>
                        <div class="text-muted" style="font-size: .80rem;">
                            <span class=""> Supported file types jpg,jpeg,png,gif.(Max 3MB)</span>
                        </div>
                        </div>
                    @else
                        <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                        <input type="file" name="headTeacherImage" id="profileImage" style="display: none;"
                            onchange="preview(this)" class="@error('headTeacherImage') is-invalid @enderror" >
                        @error('headTeacherImage')<div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <label class="font-weight-bold text-dark" for="">Click to Choose</label>
                        <div class="text-muted" style="font-size: .80rem;">
                            <span class=""> Supported file types jpg,jpeg,png,gif.(Max 3MB)</span>
                        </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('headTeacherName') ? 'has-error' : '' }}">
                <label for="headTeacherName">{{ trans('cruds.frontPage.headTeacherName') }}*</label>
                <input type="text" id="headTeacherName" name="headTeacherName" class="form-control" value="{{ old('headTeacherName', isset($frontPage) ? $frontPage->headTeacherName : '') }}" required>
                @if($errors->has('headTeacherName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('headTeacherName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('latestNewsText') ? 'has-error' : '' }}">
                <label for="latestNewsText">{{ trans('cruds.frontPage.latestNewsText') }}*</label>
                {{-- <input type="text" id="latestNewsText" name="latestNewsText" class="form-control" value="{{ old('latestNewsText') }}" required> --}}
                <textarea id="latestNewsText" class="form-control {{ $errors->has('latestNewsText') ? 'is-invalid' : '' }}" name="latestNewsText" >{{ old('latestNewsText', isset($frontPage) ? $frontPage->latestNewsText : '') }}</textarea>
                @if($errors->has('latestNewsText'))
                    <em class="invalid-feedback">
                        {{ $errors->first('latestNewsText') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">{{ trans('cruds.post.fields.is_active')}}
                </label>
                <select name="is_active" id="is_active" class="form-control" required>

                        <option value="{{ 0 }}" @if (0 == $frontPage->is_active) selected @endif>{{ 'In-Active' }}</option>
                        <option value="{{ 1 }}" @if (1 == $frontPage->is_active) selected @endif>{{ 'Active' }}</option>

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

{{-- Preview image before upload --}}
<script>
    function triggerClick(){
        document.querySelector('#profileImage').click();
    }
    function preview(e){
        if(e.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                document.querySelector('#previewImage').setAttribute('src',e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>
@endsection
