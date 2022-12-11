@extends('backend.layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            @if (session('successMessage'))
            <span class="text-success mb-3 br-section-label">{!!session('successMessage')!!}</span>
            @else
            {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }} (Students Information)
            @endif
            </div>


            <div class="card-body">
                <form action="{{ route('backend.students.store') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group {{ $errors->has('dateOfBirth') ? 'has-error' : '' }}">
                        <label for="dateOfBirth">{{ trans('cruds.student.dateOfBirth') }}</label>
                        <input type="date" name="dateOfBirth" id="dateOfBirth"  class="form-control" value="{{ old('dateOfBirth') }}">
                        @if($errors->has('dateOfBirth'))
                            <em class="invalid-feedback">
                                {{ $errors->first('dateOfBirth') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <label for="gender">{{ trans('cruds.student.gender') }}<span style="color: red;">*</span></label><br>
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

                    <label for="gender">{{ trans('cruds.student.religion') }}<span style="color: red;">*</span></label><br>
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

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="mobile">{{ trans('cruds.student.mobile') }}</label>
                        <input type="number" name="mobile" id="mobile"  class="form-control" value="{{ old('mobile') }}">
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
                        <label for="email">{{ trans('cruds.student.email') }}</label>
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
                        <label for="address">{{ trans('cruds.student.address') }}<span style="color: red;">*</span></label>
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

                    <div class="form-group {{ $errors->has('studentclass') ? 'has-error' : '' }}">
                        <label class="{{ $errors->has('studentclass') ? 'is-invalid' : '' }}" for="studentclass">{{ trans('cruds.student.class') }}<span style="color: red;">*</span></label>
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
                    </div>

                    <div class="form-group {{ $errors->has('rollNumber') ? 'has-error' : '' }}">
                        <label for="rollNumber">{{ trans('cruds.student.rollNumber') }}</label>
                        <input type="number" name="rollNumber" id="rollNumber"  class="form-control" value="{{ old('rollNumber') }}">
                        @if($errors->has('rollNumber'))
                            <em class="invalid-feedback">
                                {{ $errors->first('rollNumber') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('admissionDate') ? 'has-error' : '' }}">
                        <label for="admissionDate">{{ trans('cruds.student.admissionDate') }}</label>
                        <input type="date" name="admissionDate" id="admissionDate"  class="form-control" value="{{ old('admissionDate') }}">
                        @if($errors->has('admissionDate'))
                            <em class="invalid-feedback">
                                {{ $errors->first('admissionDate') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>


                    <label for="image">{{ trans('cruds.student.studentImage') }}</label>
                    <div class="form-group text-center" {{ $errors->has('studentImage') ? 'has-error' : '' }} style="background-color: #f1f1f1;
                        color: rgba(255, 255, 255, 0.65);
                        border-color: rgba(255, 255, 255, 0.08);border-radius:6px; padding: 1.5rem;">

                        <div>
                            <img src="{{asset('backend/images/default/img12.jpg')}}" onclick="triggerClick()" style="max-height: 140px;border-radius: 3px;" id="previewImage" alt="click here to add an image" title="click here to add your image">
                            <input type="file" name="studentImage" id="profileImage" style="display: none;"
                                onchange="preview(this)" class="@error('studentImage') is-invalid @enderror" >
                            @error('studentImage')<div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mt-2">
                            <label class="font-weight-bold text-dark" for="">Click to Choose Student's Image</label>
                            <div class="text-muted" style="font-size: .80rem;">
                                Supported file type jpg,jpeg,png <br>Maximum file size is 2MB
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }} (Parents Information)
            </div>


            <div class="card-body">

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


                    <div class="form-group {{ $errors->has('fatherMobile') ? 'has-error' : '' }}">
                        <label for="fatherMobile">{{ trans('cruds.student.fatherMobile') }}</label>
                        <input type="number" name="fatherMobile" id="fatherMobile"  class="form-control" value="{{ old('fatherMobile') }}" >
                        @if($errors->has('fatherMobile'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fatherMobile') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('fatherOccupation') ? 'has-error' : '' }}">
                        <label for="fatherOccupation">{{ trans('cruds.student.fatherOccupation') }}</label>
                        <input type="text" name="fatherOccupation" id="fatherOccupation"  class="form-control" value="{{ old('fatherOccupation') }}">
                        @if($errors->has('fatherOccupation'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fatherOccupation') }}
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

                    <div class="form-group {{ $errors->has('motherMobile') ? 'has-error' : '' }}">
                        <label for="motherMobile">{{ trans('cruds.student.motherMobile') }}</label>
                        <input type="number" name="motherMobile" id="motherMobile"  class="form-control" value="{{ old('motherMobile') }}">
                        @if($errors->has('motherMobile'))
                            <em class="invalid-feedback">
                                {{ $errors->first('motherMobile') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('motherOccupation') ? 'has-error' : '' }}">
                        <label for="motherOccupation">{{ trans('cruds.student.motherOccupation') }}</label>
                        <input type="text" name="motherOccupation" id="motherOccupation"  class="form-control" value="{{ old('motherOccupation') }}">
                        @if($errors->has('motherOccupation'))
                            <em class="invalid-feedback">
                                {{ $errors->first('motherOccupation') }}
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

