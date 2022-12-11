@extends('backend.layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            @if (session('successMessage'))
            <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
            @else
            {{ trans('global.add') }} {{ trans('cruds.teacher.title_singular') }} (Teacher's Information)
            @endif
            </div>


            <div class="card-body">
                <form action="{{ route('backend.teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('fName') ? 'has-error' : '' }}">
                        <label for="fName">{{ trans('cruds.student.fName') }}<span style="color: red;">*</span></label>
                        <input type="text" name="fName" id="fName"  class="form-control" value="{{ old('fName') }}" >
                        @if($errors->has('fName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fName') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('lName') ? 'has-error' : '' }}">
                        <label for="lName">{{ trans('cruds.student.lName') }}<span style="color: red;">*</span></label>
                        <input type="text" name="lName" id="lName"  class="form-control" value="{{ old('lName') }}" required>
                        @if($errors->has('lName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('lName') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('joinDate') ? 'has-error' : '' }}">
                        <label for="joinDate">{{ trans('cruds.teacher.joinDate') }}</label>
                        <input type="date" name="joinDate" id="joinDate"  class="form-control" value="{{ old('joinDate') }}">
                        @if($errors->has('joinDate'))
                            <em class="invalid-feedback">
                                {{ $errors->first('joinDate') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <label for="gender">{{ trans('cruds.teacher.gender') }}<span style="color: red;">*</span></label><br>
                    <div class="form-check form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1"  value="Male">
                        <label class="form-check-label" for="flexRadioDefault1" >
                          Male
                        </label>
                      </div>
                      <div class="form-check form-group {{ $errors->has('gender') ? 'has-error' : '' }} ">
                        <input class="form-check-input " type="radio" name="gender" id="flexRadioDefault2" value="Female">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Female
                        </label>
                        @if($errors->has('gender'))
                            <em class="invalid-feedback">
                                {{ $errors->first('gender') }}
                            </em>
                        @endif
                    </div>

                    <label for="religion">{{ trans('cruds.teacher.religion') }}<span style="color: red;">*</span></label><br>
                    <div class="form-check form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                        <input class="form-check-input" type="radio" name="religion" id="flexRadioDefault1"  value="Muslim">
                        <label class="form-check-label" for="flexRadioDefault1" >
                          Muslim
                        </label>
                      </div>
                      <div class="form-check form-group {{ $errors->has('religion') ? 'has-error' : '' }} ">
                        <input class="form-check-input " type="radio" name="religion" id="flexRadioDefault2" value="Hindu">
                        <label class="form-check-label" for="flexRadioDefault2">
                          Hindu
                        </label>
                        @if($errors->has('religion'))
                            <em class="invalid-feedback">
                                {{ $errors->first('religion') }}
                            </em>
                        @endif
                    </div>

                    <label for="maritalStatus">{{ trans('cruds.teacher.maritalStatus') }}</label><br>
                    <div class="form-check form-group {{ $errors->has('maritalStatus') ? 'has-error' : '' }}">
                        <input class="form-check-input" type="radio" name="maritalStatus" id="flexRadioDefault1"  value="Unmarried">
                        <label class="form-check-label" for="flexRadioDefault1" >
                            Unmarried
                        </label>
                      </div>
                      <div class="form-check form-group {{ $errors->has('maritalStatus') ? 'has-error' : '' }} ">
                        <input class="form-check-input " type="radio" name="maritalStatus" id="flexRadioDefault2" value="Married">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Married
                        </label>
                    </div>

                    <div class="form-group {{ $errors->has('contractType') ? 'has-error' : '' }}">
                        <label class=" {{ $errors->has('contractType') ? 'is-invalid' : '' }}" for="contractType">{{ trans('cruds.teacher.contractType')}}
                        </label>
                        <select name="contractType" id="contractType" class="form-control" required>

                                <option value="Part Time">{{ 'Part Time' }}</option>
                                <option value="Full Time">{{ 'Full Time' }}</option>

                        </select>
                            @if($errors->has('contractType'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contractType') }}
                                </em>
                            @endif
                        <p class="helper-block">
                            {{ trans('cruds.post.fields.category_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                        <label class="{{ $errors->has('designation') ? 'is-invalid' : '' }}" for="designation">{{ trans('cruds.teacher.designation')}}
                        </label>
                        <select name="designation" id="designation" class="form-control" required>

                                <option value="Teacher">{{ 'Teacher' }}</option>
                                <option value="Principal">{{ 'Principal' }}</option>
                                <option value="Vice Principal">{{ 'Vice Principal' }}</option>


                        </select>
                            @if($errors->has('designation'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('designation') }}
                                </em>
                            @endif
                        <p class="helper-block">
                            {{ trans('cruds.post.fields.category_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">
                        <label for="qualification">{{ trans('cruds.teacher.qualification') }}</label>
                        <input type="text" name="qualification" id="qualification"  class="form-control" value="{{ old('qualification') }}">
                        @if($errors->has('qualification'))
                            <em class="invalid-feedback">
                                {{ $errors->first('qualification') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="mobile">{{ trans('cruds.teacher.mobile') }}<span style="color: red;">*</span></label>
                        <input type="number" name="mobile" id="mobile"  class="form-control" value="{{ old('mobile') }}" required>
                        @if($errors->has('mobile'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mobile') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">{{ trans('cruds.teacher.email') }}</label>
                        <input type="email" placeholder="example@gmail.com" name="email" id="email"  class="form-control" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address">{{ trans('cruds.teacher.address') }}</label>
                        <textarea id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" >{{ old('address') }}</textarea>
                        @if($errors->has('address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    {{-- <div class="form-group {{ $errors->has('studentclass') ? 'has-error' : '' }}">
                        <label class="required {{ $errors->has('studentclass') ? 'is-invalid' : '' }}" for="studentclass">{{ trans('cruds.student.class') }}<span style="color: red;">*</span></label>
                        <select name="studentclass" id="studentclass" class="form-control" required>

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
                    </div> --}}



            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            {{ trans('global.add') }} {{ trans('cruds.teacher.title_singular') }}
            </div>


            <div class="card-body">

                <label for="image">{{ trans('cruds.teacher.teacherImage') }}</label>
                <div class="form-group text-center" {{ $errors->has('teacherImage') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                    color: rgba(255, 255, 255, 0.65);
                    border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                    <div>
                        <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                        <input type="file" name="teacherImage" id="profileImage" style="display: none;"
                            onchange="preview(this)" class="@error('teacherImage') is-invalid @enderror" >
                        @error('teacherImage')<div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="font-weight-bold text-dark" for="">Click to Choose teacher's Image</label>
                        <div class="text-muted" style="font-size: .80rem;">
                            Supported file type jpg,jpeg,png <br>Maximum file size is 2MB
                        </div>
                    </div>
                </div>

                    <div class="form-group {{ $errors->has('fatherName') ? 'has-error' : '' }}">
                        <label for="fatherName">{{ trans('cruds.student.fatherName') }}<span style="color: red;">*</span></label>
                        <input type="text" name="fatherName" id="fatherName"  class="form-control" value="{{ old('fatherName') }}" required>
                        @if($errors->has('fatherName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fatherName') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>



                    <div class="form-group {{ $errors->has('motherName') ? 'has-error' : '' }}">
                        <label for="motherName">{{ trans('cruds.student.motherName') }}<span style="color: red;">*</span></label>
                        <input type="text" name="motherName" id="motherName"  class="form-control" value="{{ old('motherName') }}" required>
                        @if($errors->has('motherName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('motherName') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
                        <label for="facebook_link">{{ trans('cruds.teacher.facebook_link') }}</label>
                        <input type="text" name="facebook_link" id="facebook_link"  class="form-control" value="{{ old('facebook_link') }}" placeholder="https://www.facebook.com/example123">
                        @if($errors->has('facebook_link'))
                            <em class="invalid-feedback">
                                {{ $errors->first('facebook_link') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('instagram_link') ? 'has-error' : '' }}">
                        <label for="instagram_link">{{ trans('cruds.teacher.instagram_link') }}</label>
                        <input type="text" name="instagram_link" id="instagram_link"  class="form-control" value="{{ old('instagram_link') }}" placeholder="https://www.instagram.com/example123">
                        @if($errors->has('instagram_link'))
                            <em class="invalid-feedback">
                                {{ $errors->first('instagram_link') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('twitter_link') ? 'has-error' : '' }}">
                        <label for="twitter_link">{{ trans('cruds.teacher.twitter_link') }}</label>
                        <input type="text" name="twitter_link" id="twitter_link"  class="form-control" value="{{ old('twitter_link') }}" placeholder="https://www.twitter.com/example123">
                        @if($errors->has('twitter_link'))
                            <em class="invalid-feedback">
                                {{ $errors->first('twitter_link') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('website_link') ? 'has-error' : '' }}">
                        <label for="website_link">{{ trans('cruds.teacher.website_link') }}</label>
                        <input type="text" name="website_link" id="website_link"  class="form-control" value="{{ old('website_link') }}" placeholder="http://www.example123.com">
                        @if($errors->has('website_link'))
                            <em class="invalid-feedback">
                                {{ $errors->first('website_link') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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

