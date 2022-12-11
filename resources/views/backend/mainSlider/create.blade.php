@extends('backend.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    @if (session('successMessage'))
    <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
    @else
    {{ trans('global.create') }} {{ trans('cruds.mainSlider.title_singular') }}
    @endif
    </div>


    <div class="card-body">
        <form action="{{ route('backend.mainSliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="sliderImage">{{ trans('cruds.mainSlider.title') }}</label>
            <div class="form-group text-center" {{ $errors->has('sliderImage') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                color: rgba(255, 255, 255, 0.65);
                border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                <div>
                    <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add attachment" title="click here to add attachment">
                    <input type="file" class="form-control" name="sliderImage" id="profileImage" style="display: none;"
                        onchange="preview(this)" class="@error('sliderImage') is-invalid @enderror" >
                    @error('sliderImage')<div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mt-2">
                    <label class="font-weight-bold text-dark" for="">Click to Choose Slider Image</label>
                    <div class="text-muted" style="font-size: .80rem;">
                        <span class="text-primary">Image size should be 1320x460 (Max 3MB) <br>Supported file types jpg,jpeg,png,gif.</span>
                    </div>
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
