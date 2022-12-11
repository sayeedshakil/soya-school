@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.class.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('backend.mainSliders.update', [$mainSlider->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="studentImage">{{ trans('cruds.mainSlider.title') }}</label>
            <div class="form-group text-center" {{ $errors->has('sliderImage') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    @if($mainSlider->sliderImage)
                        <img src="{{asset('storage/images/mainSlider/' . $mainSlider->sliderImage)}}" onclick="triggerClick()" style="max-height:180px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                        <input type="file" name="sliderImage" id="profileImage" style="display: none;"
                            onchange="preview(this)" class="@error('sliderImage') is-invalid @enderror" >
                        @error('sliderImage')<div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <label class="font-weight-bold text-dark" for="">Click to Change</label>
                        <div class="text-muted" style="font-size: .80rem;">
                            <span class="text-primary">Image size should be 1320x460 (Max 3MB) <br>Supported file types jpg,jpeg,png,gif.</span>
                        </div>
                        </div>
                    @else
                        <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                        <input type="file" name="sliderImage" id="profileImage" style="display: none;"
                            onchange="preview(this)" class="@error('sliderImage') is-invalid @enderror" >
                        @error('sliderImage')<div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <label class="font-weight-bold text-dark" for="">Click to Choose</label>
                        <div class="text-muted" style="font-size: .80rem;">
                            <span class="text-primary">Image size should be 1320x460 (Max 3MB) <br>Supported file types jpg,jpeg,png,gif.</span>
                        </div>
                        </div>
                    @endif
                </div>
            </div>


            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">{{ trans('cruds.post.fields.is_active')}}
                </label>
                <select name="is_active" id="is_active" class="form-control" required>

                        <option value="{{ 0 }}" @if (0 == $mainSlider->is_active) selected @endif>{{ 'In-Active' }}</option>
                        <option value="{{ 1 }}" @if (1 == $mainSlider->is_active) selected @endif>{{ 'Active' }}</option>

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
