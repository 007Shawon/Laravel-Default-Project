@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="needs-validation was-validated" novalidate>
        @csrf

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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
