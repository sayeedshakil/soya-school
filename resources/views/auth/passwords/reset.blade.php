@extends('backend.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <div class="text-center login-logo">
                            <img src="{{asset('storage/images/siteImage/logosoya.png')}}" class="img-fluid"  width="100vw" alt="{{ env('APP_NAME') }}">
                            {{-- <h1 class="text-uppercase font-weight-bold">{{ env('APP_NAME') }}</h1> --}}

                        </div>
                        <p class="text-muted"></p>
                        <div>
                            <input name="token" value="{{ $token }}" type="hidden">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                                @if($errors->has('password'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Password confirmation">
                                @if($errors->has('password_confirmation'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Reset Password
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
