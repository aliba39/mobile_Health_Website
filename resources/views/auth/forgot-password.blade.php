@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card card-body card-login w-50 align-items-left">
            {{--            <img src="/images/MobileHealthTabLogo.png"
                             alt="Mobile Health Logo">--}}
            <h4>Reset Password</h4>
            <p>Please enter your email and we will send you a new password.</p>

            <form class="contact__form" method="get" action="/resetpasswordmail">
                @csrf


                <input name="email" type="text" class="form-control" id="email"
                       placeholder="Your email..." value="{{ @old('email') }}" required="">

                <div class="form-button mt-3">
                    <button type="submit" id="form-submit" class="btn btn-primary">Request New Password
                    </button>
                </div>
            </form>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection


{{--


<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
