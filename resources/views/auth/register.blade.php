@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="needs-validation was-validated" novalidate>
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" value="{{ old('name') }}" required
                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input id="email" name="email" value="{{ old('email') }}" required
                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Retype Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Register!</button>
    </form>
@endsection
