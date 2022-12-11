@extends('backend.layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            @if (session('successMessage'))
            <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
            @else
            {{ trans('global.add') }} {{ trans('cruds.institutionDetails.aboutus') }}
            @endif
            </div>


            <div class="card-body">
                <form action="{{ route('backend.institution_details.update', [$institutionDetail->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                        <label class="required {{ $errors->has('is_active') ? 'is-invalid' : '' }}" for="is_active">{{ trans('cruds.post.fields.is_active')}}
                        </label>
                        <select name="is_active" id="is_active" class="form-control" required>

                                <option value="{{ 0 }}" @if (0 == $institutionDetail->is_active) selected @endif>{{ 'In-Active' }}</option>
                                <option value="{{ 1 }}" @if (1 == $institutionDetail->is_active) selected @endif>{{ 'Active' }}</option>

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

                    <div class="form-group {{ $errors->has('aboutus_title') ? 'has-error' : '' }}">
                        <label for="aboutus_title">{{ trans('cruds.institutionDetails.aboutus_title') }}<span style="color: red;">*</span></label>
                        <input type="text" name="aboutus_title" id="aboutus_title"  class="form-control" value="{{ old('aboutus_title', isset($institutionDetail) ? $institutionDetail->aboutus_title : '') }}" required>
                        @if($errors->has('aboutus_title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('aboutus_title') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('aboutus_description') ? 'has-error' : '' }}">
                        <label for="aboutus_description">{{ trans('cruds.institutionDetails.aboutus_description') }}<span style="color: red;">*</span></label>
                        <textarea id="aboutus_description" class="form-control {{ $errors->has('aboutus_description') ? 'is-invalid' : '' }}" name="aboutus_description" >{{ old('aboutus_description', isset($institutionDetail) ? $institutionDetail->aboutus_description : '') }}</textarea>
                        @if($errors->has('aboutus_description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('aboutus_description') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <label for="aboutus_image">{{ trans('cruds.institutionDetails.aboutus_image') }}</label>
                    <div class="form-group text-center" {{ $errors->has('aboutus_image') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                        color: rgba(255, 255, 255, 0.65);
                        border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                        <div>
                            @if($institutionDetail->aboutus_image)
                                <img src="{{asset('storage/images/siteImage/' . $institutionDetail->aboutus_image)}}" onclick="triggerClick()" style="max-height:180px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                                <input type="file" name="aboutus_image" id="profileImage" style="display: none;"
                                    onchange="preview(this)" class="@error('aboutus_image') is-invalid @enderror" >
                                @error('aboutus_image')<div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <label class="font-weight-bold text-dark" for="">Click to change</label>
                                    <div class="text-muted" style="font-size: .80rem;">
                                    Supported file type jpg,jpeg,png <br>Maximum file size is 3MB
                                    </div>
                                </div>
                            @else
                                <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                                <input type="file" name="aboutus_image" id="profileImage" style="display: none;"
                                    onchange="preview(this)" class="@error('aboutus_image') is-invalid @enderror" >
                                @error('aboutus_image')<div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <label class="font-weight-bold text-dark" for="">Click to Choose </label>
                                    <div class="text-muted" style="font-size: .80rem;">
                                    Supported file type jpg,jpeg,png  <br>Maximum file size is 2MB
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            {{ trans('global.add') }} {{ trans('cruds.institutionDetails.contactus') }}
            </div>


            <div class="card-body">

                    <div class="form-group {{ $errors->has('contactus_school_name') ? 'has-error' : '' }}">
                        <label for="contactus_school_name">{{ trans('cruds.institutionDetails.contactus_school_name') }}<span style="color: red;">*</span></label>
                        <input type="text" name="contactus_school_name" id="contactus_school_name"  class="form-control" value="{{ old('contactus_school_name', isset($institutionDetail) ? $institutionDetail->contactus_school_name : '') }}" required>
                        @if($errors->has('contactus_school_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('contactus_school_name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('contactus_address') ? 'has-error' : '' }}">
                        <label for="contactus_address">{{ trans('cruds.institutionDetails.contactus_address') }}<span style="color: red;">*</span></label>
                        <textarea id="contactus_address" class="form-control {{ $errors->has('contactus_address') ? 'is-invalid' : '' }}" name="contactus_address" >{{ old('contactus_address', isset($institutionDetail) ? $institutionDetail->contactus_address : '') }}</textarea>
                        @if($errors->has('contactus_address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('contactus_address') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('contactus_mobile') ? 'has-error' : '' }}">
                        <label for="contactus_mobile">{{ trans('cruds.institutionDetails.contactus_mobile') }}</label>
                        <input type="number" name="contactus_mobile" id="contactus_mobile"  class="form-control" value="{{ old('contactus_mobile', isset($institutionDetail) ? $institutionDetail->contactus_mobile : '') }}">
                        @if($errors->has('contactus_mobile'))
                            <em class="invalid-feedback">
                                {{ $errors->first('contactus_mobile') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('contactus_telephone') ? 'has-error' : '' }}">
                        <label for="contactus_telephone">{{ trans('cruds.institutionDetails.contactus_telephone') }}</label>
                        <input type="number" name="contactus_telephone" id="contactus_telephone"  class="form-control" value="{{ old('contactus_telephone', isset($institutionDetail) ? $institutionDetail->contactus_telephone : '') }}">
                        @if($errors->has('contactus_telephone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('contactus_telephone') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('contactus_email') ? 'has-error' : '' }}">
                        <label for="contactus_email">{{ trans('cruds.institutionDetails.contactus_email') }}</label>
                        <input type="contactus_email" placeholder="example@gmail.com" name="contactus_email" id="contactus_email"  class="form-control" value="{{ old('contactus_email', isset($institutionDetail) ? $institutionDetail->contactus_email : '') }}">
                        @if($errors->has('contactus_email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('contactus_email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>


                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.update') }}">
                    </div>
                </form>


            </div>
        </div>
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

