@extends('backend.layouts.admin')
@section('content')
{{-- @can('profile_access') --}}

    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        @if($student->studentImage)
                            <img src="{{ asset('storage/images/students/' . $student->studentImage) }}" class="rounded-circle img-fluid" style="width:150px; height:150px" alt="{{$student->lname}}" title="{{$student->lname}} ">
                        @else
                            <img src="{{ asset('backend/images/default/default_user.png') }}" class="rounded-circle img-fluid" style="width:150px; height:150px"
                            alt="{{$student->lname}}" title="{{$student->lname}} ">
                        @endif

                        <div class="mt-3">
                          <h4 class="text-uppercase">{{ $student->fName ?? ''}} {{ $student->lName ?? ''}}</h4>

                          <h5 class="text-info">{{ $student->studentclass->name ?? ''}}</h5>
                          <h5 class="text-info">{{ $student->gender ?? ''}}</h5>
                          <h5 class="text-info">{{ $student->mobile ?? ''}}</h5>
                          {{-- <p class="text-secondary mb-1">{{$student->about_title ?? ''}}</p> --}}

                          {{-- <button class="btn btn-primary"> @foreach($profile->roles()->pluck('name') as $role)
                            <span class="label label-info label-many badge badge-info">{{ $role }}</span>
                        @endforeach</button> --}}
                          {{-- <button class="btn btn-outline-primary">Message</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <a href="{{$profile->facebook_link ?? ''}}" target="_blank">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">{{$profile->facebook_link ?? ''}}</span>
                            </li>
                        </a>
                        <a href="{{$profile->instagram_link ?? ''}}"target="_blank">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">{{$profile->instagram_link ?? ''}}</span>
                            </li>
                        </a>
                        <a href="{{$profile->twitter_link ?? ''}}"target="_blank">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <span class="text-secondary">{{$profile->twitter_link ?? ''}}</span>
                            </li>
                        </a>
                      <a href="{{$profile->website_link ?? ''}}"target="_blank">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                            <span class="text-secondary">{{$profile->website_link ?? ''}}</span>
                          </li>
                      </a>

                      {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg ></svg><img class="feather feather-github mr-2 icon-inline" src="{{asset('backend/icons/sprites/youtube.svg')}}" alt=""> YouTube</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>


                    </ul>
                  </div> --}}
                </div>

                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Student Id</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->studentId ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Admission Number</h6>
                        </div>
                        <div class="col-sm-9">
                            {{ $student->admissionNumber  ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Admission Date</h6>
                        </div>
                        <div class="col-sm-9">
                            {{ $student->admissionDate  ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->fName ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->lName  ?? ''}}
                        </div>
                      </div>
                      <hr>

                      {{-- <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->gender  ?? ''}}
                        </div>
                      </div>
                      <hr> --}}
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Date Of Birth</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->dateOfBirth  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Religion</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->religion  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->address  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Student Mobile</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->mobile  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->email  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Father Name</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->fatherName  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Father Mobile</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->fatherMobile  ?? ''}}
                        </div>
                      </div>
                      <hr><div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Father Occupation</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->fatherOccupation  ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mother Name</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->motherName  ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mother Mobile</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->motherMobile  ?? ''}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Mother Occupation</h6>
                        </div>
                        <div class="col-sm-9 ">
                            {{ $student->motherOccupation  ?? ''}}
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info "  href="{{route('backend.students.edit',$student->id)}}">Edit</a>
                        </div>
                      </div>
                    </div>
                  </div>


                  {{-- <div><h4  class="text-center mb-3">MY POSTS</h4></div>
                  @forelse($profile->posts->where('is_active') as $post)
                  <div class="row">
                    <div class="col-sm-12 ">
                      <div class="card">
                        <div class="card-body">
                        <h6 class="d-flex align-items-center " ><i class="text-info ">{{ $post->category->name }}  </i>
                            </h6><hr>
                          <small>
                            <a href="{{route('readonnet.posts.show',$post)}}"> <h4>{{ $post->title }}</h4></a>
                            {{$post->created_at->format('d F Y')}}
                           </small>
                        </div>
                      </div>
                    </div>
                  </div>
                  @empty
                  <div class="row">
                    <div class="col-sm-12 ">
                      <div class="card">
                        <div class="card-body">
                          <small>
                             <h4  class="text-center text-secondary">You Have No Post Published yet..</h4>

                           </small>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforelse --}}



                </div>
              </div>

            </div>
        </div>

{{-- @endcan --}}
@endsection

