@extends('auth.layouts.app')

@section('meta_title')
GoldenTest | Reset password
@endsection

@section('content')
<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/images/logo.png" alt="Golden test" width="200">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">{{ __('Send Password Reset Link') }}</button>

                            </form>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
