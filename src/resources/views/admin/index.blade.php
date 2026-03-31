@extends('layouts.app')

@section('title', 'Admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

    <div class="admin">

        <h2 class="admin__title">Admin</h2>

        {{-- ① 検索 --}}
        <div class="admin__search">

            <form method="GET" action="{{ route('admin.index') }}" class="admin-search">

                <div class="admin-search__group">
                    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
                </div>


                <div class="admin-search__group">

                    <select name="gender">

                        <option value="">性別</option>

                        <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>
                            男性
                        </option>

                        <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>
                            女性
                        </option>

                        <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>
                            その他
                        </option>

                    </select>

                </div>


                <div class="admin-search__group">

                    <select name="category_id">

                        <option value="">お問い合わせの種類</option>

                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="admin-search__group">
                    <input type="date" name="created_at" value="{{ request('created_at') }}">
                </div>


                <button class="admin-search__button">
                    検索
                </button>


                <a href="{{ route('admin.index') }}" class="admin-search__reset">
                    リセット
                </a>

            </form>

        </div>


        {{-- ② 中段（エクスポート＋ページネーション --}}
        <div class="admin__middle">

            <div class="admin__export">

                <button class="admin__export-button">
                    エクスポート
                </button>

            </div>


            <div class="admin__pagination">

                {{ $contacts->links('pagination::bootstrap-4') }}

            </div>

        </div>


        {{-- ③ テーブル --}}
        <div class="admin__table">

            <table class="admin-table">

                <tr>

                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th class="admin-table__action"></th>

                </tr>


                @foreach ($contacts as $contact)

                    <tr>

                        <td>
                            {{ $contact->last_name }}
                            {{ $contact->first_name }}
                        </td>


                        <td>
                            {{ ['', '男性', '女性', 'その他'][$contact->gender] }}
                        </td>


                        <td>
                            {{ $contact->email }}
                        </td>


                        <td>
                            {{ $contact->category->content ?? '' }}
                        </td>


                        <td>

                            <label for="modal-toggle-{{ $contact->id }}" class="admin-table__detail-button">
                                詳細
                            </label>


                            <input type="checkbox" id="modal-toggle-{{ $contact->id }}" class="modal-toggle">


                            <div class="modal">

                                <div class="modal__content">

                                    <label for="modal-toggle-{{ $contact->id }}" class="modal__close">
                                        ×
                                    </label>


                                    <div class="modal__row">
                                        <span class="modal__label">お名前</span>
                                        <span>
                                            {{ $contact->last_name }}
                                            {{ $contact->first_name }}
                                        </span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">性別</span>
                                        <span>
                                            {{ ['', '男性', '女性', 'その他'][$contact->gender] }}
                                        </span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">メールアドレス</span>
                                        <span>{{ $contact->email }}</span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">電話番号</span>
                                        <span>{{ $contact->tel }}</span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">住所</span>
                                        <span>{{ $contact->address }}</span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">建物名</span>
                                        <span>{{ $contact->building }}</span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">お問い合わせの種類</span>
                                        <span>
                                            {{ $contact->category->content ?? '' }}
                                        </span>
                                    </div>


                                    <div class="modal__row">
                                        <span class="modal__label">お問い合わせ内容</span>
                                        <span>{{ $contact->detail }}</span>
                                    </div>


                                    <form method="POST" action="{{ route('admin.delete', $contact->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button class="modal__delete-button">
                                            削除
                                        </button>

                                    </form>


                                </div>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </table>

        </div>

    </div>

@endsection