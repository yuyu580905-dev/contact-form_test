@php
    $hideHeader = true;
@endphp

@extends('layouts.app')

@section('title', 'Thanks')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

    <div class="thanks">

        <div class="thanks__inner">

            <h2 class="thanks__message">
                お問い合わせありがとうございました
            </h2>

            <a href="/" class="thanks__button">
                HOME
            </a>

        </div>

    </div>

@endsection