@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

    <div class="confirm">

        <h2 class="confirm__heading">Confirm</h2>

        <table class="confirm__table">

            <tr>
                <th>お名前</th>
                <td>{{ $last_name }} {{ $first_name }}</td>
            </tr>

            <tr>
                <th>性別</th>
                <td>{{ $gender_text }}</td>
            </tr>

            <tr>
                <th>メールアドレス</th>
                <td>{{ $email }}</td>
            </tr>

            <tr>
                <th>電話番号</th>
                <td>{{ $tel1 }}{{ $tel2 }}{{ $tel3 }}</td>
            </tr>

            <tr>
                <th>住所</th>
                <td>{{ $address }}</td>
            </tr>

            <tr>
                <th>建物名</th>
                <td>{{ $building }}</td>
            </tr>

            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $category_content }}</td>
            </tr>

            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $detail }}</td>
            </tr>

        </table>


        <div class="confirm__button">

            {{-- 送信ボタン --}}
            <form method="post" action="/thanks">
                @csrf

                <input type="hidden" name="first_name" value="{{ $first_name }}">
                <input type="hidden" name="last_name" value="{{ $last_name }}">
                <input type="hidden" name="gender" value="{{ $gender }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="tel1" value="{{ $tel1 }}">
                <input type="hidden" name="tel2" value="{{ $tel2 }}">
                <input type="hidden" name="tel3" value="{{ $tel3 }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="building" value="{{ $building }}">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input type="hidden" name="detail" value="{{ $detail }}">

                <button type="submit" class="confirm__submit">
                    送信
                </button>

            </form>


            {{-- 修正ボタン --}}
            <form action="/back" method="post">
                @csrf

                <input type="hidden" name="first_name" value="{{ $first_name }}">
                <input type="hidden" name="last_name" value="{{ $last_name }}">
                <input type="hidden" name="gender" value="{{ $gender }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="tel1" value="{{ $tel1 }}">
                <input type="hidden" name="tel2" value="{{ $tel2 }}">
                <input type="hidden" name="tel3" value="{{ $tel3 }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="building" value="{{ $building }}">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input type="hidden" name="detail" value="{{ $detail }}">

                <button type="submit" class="confirm__back">
                    修正
                </button>

            </form>

        </div>

    </div>

@endsection