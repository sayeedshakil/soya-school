@extends('backend.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-box-shadow">
                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="text-center login-logo">
                            <img src="{{asset('storage/images/siteImage/logosoya.png')}}" class="img-fluid"  width="100vw" alt="{{ env('APP_NAME') }}">
                            {{-- <h1 class="text-uppercase font-weight-bold">{{ env('APP_NAME') }}</h1> --}}

                        </div>

                        <p class="text-muted text-center">{{ trans('global.reset_password') }}</p>
                        <p class="text-muted"></p>
                        <div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('global.send_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
