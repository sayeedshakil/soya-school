<section class="header">
    <div class="row px-2 py-2 justify-content-center" style="background-color:#547390; column-gap:0px">
    {{-- <div class="row px-2 py-2 justify-content-center" style="background-color:#54905A; border:2px solid #B0BAA6; column-gap:0px"> --}}
        <div class="col-2">
            <img src="{{asset('storage/images/siteImage/bangladeshlogo.png')}}" class="img-fluid " width="120vw"   alt="">
        </div>
        @foreach ($frontPage as $item)
        <div class="col-8 text-center text-white fw-semibold text-uppercase  ">
            <span style="font-size: 3vw"> {{$item->headerNameEn}}</span> <br>
            <span style="font-size: 2.5vw">{{$item->headerNameBn}}</span>
        </div>
        @endforeach
        <div class="col-2">
            <img src="{{asset('storage/images/siteImage/logosoya.png')}}" class="img-fluid" style="float:right;" width="120vw" alt="{{ env('APP_NAME') }}">
        </div>
    </div>
</section>


{{-- <table class="g-0" style="background-color:#54905A; border:1px solid #B0BAA6; width:100%">
    <thead></thead>
    <tbody>
        <tr>
            <td><img src="{{asset('storage/images/siteImage/bangladeshlogo.png')}}" class="img-fluid " width="120vw"   alt=""></td>
            <td>@foreach ($frontPage as $item)
                <div class=" text-center  text-white fw-semibold text-uppercase  ">
                    <span style="font-size:2vw;"> {{$item->headerNameEn}}</span> <br>
                    <span style="font-size:2vw;">{{$item->headerNameBn}}</span>
                </div>
                @endforeach
            </td>
            <td><img src="{{asset('storage/images/siteImage/logosoya.jpg')}}" class="img-fluid" style="float:right;" width="120vw" alt="{{ env('APP_NAME') }}"></td>
        </tr>
    </tbody>
</table> --}}
