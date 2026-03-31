@extends('layouts.app')

@section('title', 'Register')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

    <div class="auth">

        <h2 class="auth__title">Register</h2>

        <div class="auth__card">

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <div class="auth__group">
                    <label>お名前</label>

                    <input type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">

                    @error('name')
                        <p class="auth__error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="auth__group">
                    <label>メールアドレス</label>

                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">

                    @error('email')
                        <p class="auth__error">{{ $message }}</p>
                    @enderror
                </div>


                <div class="auth__group">
                    <label>パスワード</label>

                    <input type="password" name="password" placeholder="例: coachtech2468">

                    @error('password')
                        <p class="auth__error">{{ $message }}</p>
                    @enderror
                </div>


                <button class="auth__button">
                    登録
                </button>

            </form>

        </div>

    </div>

@endsection