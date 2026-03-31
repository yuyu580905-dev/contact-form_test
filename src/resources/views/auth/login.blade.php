@extends('layouts.app')

@section('title', 'Login')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

    <div class="auth">

        <h2 class="auth__title">Login</h2>

        <div class="auth__card">

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="auth__group">
                    <label>メールアドレス</label>

                    <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">

                    @error('email')
                        <p class="auth__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth__group">
                    <label>パスワード</label>

                    <input type="password" name="password" placeholder="例: coachtech1357">

                    @error('password')
                        <p class="auth__error">{{ $message }}</p>
                    @enderror
                </div>


                <button class="auth__button">
                    ログイン
                </button>

            </form>

        </div>

    </div>

@endsection