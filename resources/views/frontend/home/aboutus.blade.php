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


    <div class=" px-5">

        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        @foreach ($aboutus as $item)
          <div class="col-10 col-sm-8 col-lg-6">
            @if($item->aboutus_image)
                <img src="{{ asset('storage/images/siteImage/' . $item->aboutus_image) }}" style="max-height: 500px;border-radius:3px; " class="img-fluid" alt="{{$item->aboutus_title}} "
                title="{{$item->aboutus_title}} ">
            @else
                <img src="{{asset('storage/images/siteImage/013.jpeg')}}" class="d-block mx-lg-auto img-fluid"  width="700" height="500" loading="lazy" alt="{{$item->aboutus_title}} " title="{{$item->aboutus_title}} ">
            @endif

          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">{{ $item->aboutus_title ?? '' }}</h1>
            <p class="lead">
                {{ $item->aboutus_description ?? '' }}
            </p>

          </div>

        @endforeach


            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('soya.contactus')}}" class="btn btn-primary btn-lg px-4 me-md-2">Contact Us</a>
                {{-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> --}}
            </div>
        </div>
    </div>
@endsection
