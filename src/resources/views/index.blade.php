@extends('layouts.app')

@section('title', 'Contact')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

    <div class="contact-form">

        <h2 class="contact-form__heading">Contact</h2>

        <form method="post" action="/confirm">
            @csrf

            <div class="contact-form__group">
                <label class="contact-form__label">お名前 <span class="required">※</span></label>

                <div class="contact-form__input-area contact-form__name">

                    <div class="contact-form__name-box">
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="contact-form__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="contact-form__name-box">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="contact-form__error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">性別 <span class="required">※</span></label>

                <div class="contact-form__input-area">

                    <div class="contact-form__radio">
                        <label>
                            <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                            男性
                        </label>

                        <label>
                            <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                            女性
                        </label>

                        <label>
                            <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>
                            その他
                        </label>
                    </div>

                    @error('gender')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">メールアドレス <span class="required">※</span></label>

                <div class="contact-form__input-area">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">電話番号 <span class="required">※</span></label>

                <div class="contact-form__input-area">

                    <div class="contact-form__tel">

                        <div class="contact-form__tel-box">
                            <input type="text" name="tel1" value="{{ old('tel1') }}">
                            @error('tel1')
                                <p class="contact-form__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <span>-</span>

                        <div class="contact-form__tel-box">
                            <input type="text" name="tel2" value="{{ old('tel2') }}">
                            @error('tel2')
                                <p class="contact-form__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <span>-</span>

                        <div class="contact-form__tel-box">
                            <input type="text" name="tel3" value="{{ old('tel3') }}">
                            @error('tel3')
                                <p class="contact-form__error">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">住所 <span class="required">※</span></label>

                <div class="contact-form__input-area">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">

                    @error('address')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">建物名</label>

                <div class="contact-form__input-area">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">
                    お問い合わせの種類 <span class="required">※</span>
                </label>

                <div class="contact-form__input-area">

                    <select name="category_id">
                        <option value="">選択してください</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="contact-form__group">
                <label class="contact-form__label">
                    お問い合わせ内容 <span class="required">※</span>
                </label>

                <div class="contact-form__input-area">

                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>

                    @error('detail')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="contact-form__button">
                <button type="submit">確認画面</button>
            </div>

        </form>
    </div>

@endsection