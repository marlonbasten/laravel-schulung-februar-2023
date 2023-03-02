@extends('layouts.app')

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
                    @endif

                    {{ __('You are logged in!', ['name' => auth()->user()->name]) }}

                        <br>

                    {{ transf('messages.welcome', ['name' => auth()->user()->name]) }}

                        <br>

                    {{ trans_choice('{0} There are none|[1,19] There are some|[20,*] There are many', 2) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
