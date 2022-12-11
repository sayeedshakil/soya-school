@extends('frontend.layouts.masterfrontend')
@section('body_content')
    {{-- <div class="row">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="display-5 fw-bold">Centered hero</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
              </div>
            </div>
          </div>
    </div> --}}
    <div class="card my-4 mx-3 ">
        <h5 class="card-header text-center fw-bold ">Notice Board</h5>
        <div class="card-body">
            <ol class="list-group list-group-numbered">
                @foreach ($notices as $item)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold"><a class="text-decoration-none" href="{{route('soya.viewnotice',$item->id)}}">{{$item->title}}-({{$item->updated_at->format('d/m/Y')}})</a></div>
                    <div>{{$item->studentClass->name}}-{{$item->category->name}} </div>
                    {{-- <div>{{$item->description}}</div> --}}
                  </div>
                    <span class="">
                        @if ($item->attachment)
                            <a class="btn btn-secondary " href="{{asset('storage/images/attachment/'.$item->attachment)}}" download="{{$item->title}}-notice" >
                                <i class="fas fa-download "></i>
                                {{-- Download Notice --}}
                            </a>
                        @else
                            {{''}}
                        @endif
                    </span>
                </li>
                @endforeach

            </ol>
        </div>
    </div>


@endsection
