@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-50">
            @if (session('status'))
                <div class="help is-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-content">
                    <h1 class="title">Reset Password</h1>
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input id="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" placeholder="e.g. alexsmith@gmail.com" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="control">
                            <button class="button is-primary is-outlined is-fullwidth m-t-20">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="has-text-centered m-t-10"><a class="text-muted" href="{{route('login')}}">Back To Login</a></h5>
        </div>
    </div>
</div>

@endsection
