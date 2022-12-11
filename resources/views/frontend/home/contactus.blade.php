@extends('frontend.layouts.masterfrontend')
@section('body_content')


    @foreach ($contactus as $item)
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Contact Details</h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="fw-bold">Name:</span> {{ $item->contactus_school_name ?? '' }}</li>
                <li class="list-group-item"><span class="fw-bold">Address:</span> {{ $item->contactus_address ?? '' }}</li>
                <li class="list-group-item"><span class="fw-bold">Mobile:</span> {{ $item->contactus_mobile ?? '' }} </li>
                <li class="list-group-item"><span class="fw-bold">Telephone:</span> {{ $item->contactus_telephone ?? '' }} </li>
                <li class="list-group-item"><span class="fw-bold">Email:</span> {{ $item->contactus_email ?? '' }} </li>


              </ul>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            {{-- <form class="p-4 p-md-5 border rounded-3 bg-light">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
              <hr class="my-4">
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
            </form> --}}
            <h1 class="fw-bold lh-1 mb-3">Address Map</h1>
            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.203076456929!2d89.6219986148262!3d25.7307970836508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e2cd5dd36f3ba9%3A0x91f6282076675cbf!2sSoya%20School%20and%20College!5e0!3m2!1sen!2sbd!4v1669144104735!5m2!1sen!2sbd" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    @endforeach


@endsection
