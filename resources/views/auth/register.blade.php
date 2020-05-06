@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="card m-t-50">
                    <div class="card-content">
                        <h1 class="title">Register</h1>
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input id="name" class="input {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" type="text" placeholder="e.g. mo.abdo" required>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help is-danger" role="alert">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
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
                            <div class="columns">
                                <div class="column">
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
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Password Confirmation</label>
                                        <div class="control">
                                        <input id="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" type="password" required>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help is-danger" role="alert">
                                                {{ $errors->first('password_confirmation') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <b-checkbox id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember</b-checkbox>
                            <div class="control">
                                <button class="button is-primary is-outlined is-fullwidth m-t-10">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
