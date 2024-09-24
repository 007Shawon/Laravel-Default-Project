@extends('layouts.app')

@section('title', 'Home page')

@section('content')
<h1>Welcome to Laravel</h1>
<p>Laravel is a free and open-source PHP-based web framework for building web applications.
    It was created by Taylor Otwell and intended for the development of web applications following the
    model–view–controller architectural pattern and based on Symfony</p>

{{--<div>--}}
{{--@for ($i = 0; $i < 10; $i++)--}}
{{--  <div>The current value is {{ $i }}</div>--}}
{{--@endfor--}}
{{--</div>--}}

{{--<div>--}}
{{--  @php $done = false @endphp--}}
{{--  @while(!$done)--}}
{{--    <div>I'm not done</div>--}}

{{--    @php--}}
{{--      if (random_int(0, 1) === 1) $done = true--}}
{{--    @endphp--}}
{{--  @endwhile--}}
{{--</div>--}}
@endsection
