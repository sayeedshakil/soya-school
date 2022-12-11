@extends('frontend.layouts.masterfrontend')
@section('body_content')
    <div class="row">
        <div class="px-4 py-2 my-3 text-center">
            {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            {{-- @foreach ($notice as $item) --}}
            <h2 class="fw-bold">{{$notice->title}}</h2>
            <h4><div>Class: {{$notice->studentClass->name}}-{{$notice->category->name}} </div></h4>
            <h6>({{$notice->updated_at->format('d/m/Y')}})</h6>
            <div class="col-lg-10 mx-auto">
              <p class="lead mb-4">{{$notice->description}}</p>
              <p class="lead mb-4">
                <div>
                    @if ($notice->attachment)
                        <iframe src="/storage/images/attachment/{{$notice->attachment}}" class="responsive" width="100%" height="600px"></iframe>

                        <a class="btn btn-secondary mt-2" href="{{asset('storage/images/attachment/'.$notice->attachment)}}" download="{{$notice->title}}-notice" >
                            <i class="fas fa-download "> Download</i>
                            {{-- Download Notice --}}
                        </a>
                    @else
                        {{'No file found!'}}
                    @endif

                    {{-- return response()->file($pathToFile);
                    return response()->file($pathToFile, $headers); --}}

                </div>

              </p>
            </div>
          </div>
          {{-- @endforeach --}}
    </div>

@endsection
