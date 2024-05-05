@extends('layouts.app')
@section('content')

    <h2>Add New User</h2>
    <hr>

    <div class="form-content">
        <form method="POST" action="/users">
            @csrf

            <div class="form-group col-md-6">
                <label for="name">Name*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                       name="name" value="{{ @old('name') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email*</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ @old('email') }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="password">Password*</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" minlength="8" value="">
            </div>

            <div class="form-group col-md-6">
                <label for="isAdmin">Administrator* (0=No, 1=Yes)</label>
                <input type="text" class="form-control @error('isAdmin') is-invalid @enderror"
                       id="isAdmin" name="isAdmin" value="{{ @old('isAdmin') }}">
            </div>

            <div class="form-button mt-3">
                <input class="btn btn-primary" type="submit" value="Save">
                <a class="btn btn-warning mx-1" href="/users">Cancel</a>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection


