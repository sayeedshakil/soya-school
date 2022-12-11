<!-- menu start -->
{{-- <section class="row">
    <div class="menu justify-content-center">
        <ul class="nav justify-content-center">
            <li><a href="">home</a></li>
            <li><a href="">about us</a> </li>
            <li><a href="">contact us</a></li>
            <li><a href="#">services</a>
                <ul>
                    <li><a href="">service 1</a></li>
                    <li><a href="">service 1</a></li>
                    <li><a href="">service 1</a></li>
                    <li><a href="">service 1</a></li>
                </ul>
            </li>
        </ul>
    </div>
</section> --}}
<!-- menu end -->
<nav class="row navbar justify-content-center navbar-expand-sm navbar-dark px-3" style="background-color: #46627d;">
{{-- <nav class="row navbar justify-content-center navbar-expand-sm navbar-dark" style="background-color: #54905A;#547390"> --}}
    <div class="container-fluid  ">
      <a class="navbar-brand" href="{{route('home')}}">Home</a>
      <a class="navbar-brand" href="{{route('soya.aboutus')}}">About Us</a>
      {{-- <a class="navbar-brand" href="{{route('soya.contactus')}}">Contact Us</a> --}}
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('soya.allnotice')}}">Notices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  href="{{route('soya.contactus')}}">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" target="_blank" href="{{route('login')}}">LogIn</a></li>
              {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li> --}}
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>



