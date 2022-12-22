{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    <div class="card-body">
                        <h5 class="card-title">Name : {{ $users->name }}</h5>
                        <p class="card-text">Email : {{ $users->email }}</p>
                    </div>
                    @endif
                    {{ __('You are logged in! ') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Welcome to Dashboard</div>



                <div class="card-body">
                    <h4>Hi  {{ Auth::user()->name }}</h3>

                    <p>Email: {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
