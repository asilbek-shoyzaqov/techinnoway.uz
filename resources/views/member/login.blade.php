@extends('layouts.loginlayouts')
@section('title', 'Kursga kirish')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-2 col-lg-7 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="text-center">“Arxitektura-qurilish” Uyushmasining Online Platformasi</h4>
                </div>
                <div class="card-body">
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('member.login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input id="login" type="text" class="form-control" name="login" tabindex="1" required autofocus value="{{ old('login') }}">
                            @if ($errors->has('login'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('login') }}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    Please fill in your login
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Parol</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @else
                                <div class="invalid-feedback">
                                    Please fill in your password
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Eslab qolish</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Kirish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
