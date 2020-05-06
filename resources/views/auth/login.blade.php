@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3 m-t-50">
                <div class="card">
                    <div class="card-content">
                        <h1 class="title">Login</h1>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                <input id="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help is-danger" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <b-checkbox id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember</b-checkbox>
                            <div class="control">
                                <button class="button is-primary is-outlined is-fullwidth m-t-30">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <h5 class="has-text-centered m-t-10"><a class="text-muted" href="{{ route('password.request') }}">Forgot Your Password</a></h5>
            </div>
        </div>
    </div>
@endsection
