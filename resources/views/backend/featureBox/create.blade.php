@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    @if (session('successMessage'))
    <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
    @else
    {{ trans('global.create') }}
    @endif
    </div>


    <div class="card-body">
        <form action="{{ route('backend.feature_box.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('feature_title') ? 'has-error' : '' }}">
                <label for="feature_title">{{ trans('cruds.featureBox.feature_title') }}*</label>
                <input type="text" id="feature_title" name="feature_title" class="form-control" value="{{ old('feature_title') }}" required>
                @if($errors->has('feature_title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('feature_title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <label for="feature_image">{{ trans('cruds.featureBox.feature_image') }}*</label>
            <div class="form-group text-center" {{ $errors->has('feature_image') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add feature_image" title="click here to add feature_image">
                    <input type="file" class="form-control" name="feature_image" id="profileImage" style="display: none;"
                        onchange="preview(this)" class="@error('feature_image') is-invalid @enderror" >
                    @error('feature_image')<div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mt-2">
                    <label class="font-weight-bold text-dark" for="">Click to Choose </label>
                    <div class="text-muted" style="font-size: .80rem;">
                        Supported file type jpg,jpeg,png <br>Maximum file size is 512KB
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('feature_subtitle1') ? 'has-error' : '' }}">
                    <label for="feature_subtitle1">{{ trans('cruds.featureBox.feature_subtitle1') }}</label>
                    <input type="text" id="feature_subtitle1" name="feature_subtitle1" class="form-control" value="{{ old('feature_subtitle1') }}" >
                    @if($errors->has('feature_subtitle1'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle1') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>

                <div class=" col-md-6 form-group {{ $errors->has('feature_subtitle_link1') ? 'has-error' : '' }}">
                    <label for="feature_subtitle_link1">{{ trans('cruds.featureBox.feature_subtitle_link1') }}</label>
                    <input type="text" id="feature_subtitle_link1" name="feature_subtitle_link1" class="form-control" value="{{ old('feature_subtitle_link1') }}" placeholder="https://example.com">
                    @if($errors->has('feature_subtitle_link1'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle_link1') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('feature_subtitle2') ? 'has-error' : '' }}">
                    <label for="feature_subtitle2">{{ trans('cruds.featureBox.feature_subtitle2') }}</label>
                    <input type="text" id="feature_subtitle2" name="feature_subtitle2" class="form-control" value="{{ old('feature_subtitle2') }}" >
                    @if($errors->has('feature_subtitle2'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle2') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>

                <div class=" col-md-6 form-group {{ $errors->has('feature_subtitle_link2') ? 'has-error' : '' }}">
                    <label for="feature_subtitle_link2">{{ trans('cruds.featureBox.feature_subtitle_link2') }}</label>
                    <input type="text" id="feature_subtitle_link2" name="feature_subtitle_link2" class="form-control" value="{{ old('feature_subtitle_link2') }}" placeholder="https://example.com">
                    @if($errors->has('feature_subtitle_link2'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle_link2') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group {{ $errors->has('feature_subtitle3') ? 'has-error' : '' }}">
                    <label for="feature_subtitle3">{{ trans('cruds.featureBox.feature_subtitle3') }}</label>
                    <input type="text" id="feature_subtitle3" name="feature_subtitle3" class="form-control" value="{{ old('feature_subtitle3') }}" >
                    @if($errors->has('feature_subtitle3'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle3') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>

                <div class=" col-md-6 form-group {{ $errors->has('feature_subtitle_link3') ? 'has-error' : '' }}">
                    <label for="feature_subtitle_link3">{{ trans('cruds.featureBox.feature_subtitle_link3') }}</label>
                    <input type="text" id="feature_subtitle_link3" name="feature_subtitle_link3" class="form-control" value="{{ old('feature_subtitle_link3') }}" placeholder="https://example.com">
                    @if($errors->has('feature_subtitle_link3'))
                        <em class="invalid-feedback">
                            {{ $errors->first('feature_subtitle_link3') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>
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
