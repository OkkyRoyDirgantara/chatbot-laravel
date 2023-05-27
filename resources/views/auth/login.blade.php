@extends('admin.layout.master')

@section('title', 'Login Admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" class="form-control" required>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <img src="{!! captcha_src('flat') !!}" alt="Captcha Image" class="img-fluid">
                                <input id="captcha" type="text" class="form-control mt-2" placeholder="Enter Captcha" name="captcha" required>
                            </div>

                            @if ($errors->has('captcha'))
                                <div class="alert alert-danger mt-2">{{ $errors->first('captcha') }}</div>
                            @endif

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--    <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>--}}
{{--    @if ($errors->has('g-recaptcha-response'))--}}
{{--        <span class="invalid-feedback" style="display: block;">--}}
{{--        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
{{--    </span>--}}
{{--    @endif--}}
