@extends('layouts.app')

@section('content')
<script src="{{ asset('/js/listing/index.js') }}"></script>
<div class="topPage">
    <div class="listWrapper">
        @foreach ($listings as $listing)
            <div class="list">
                <div class="list_header">
                    <h2 class="list_header_title">{{ $listing->title }}</h2>
                    <div class="list_header_action">
                        <a onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')" href="{{ url('/listingsdelete', $listing->id) }}">削除</a>
                        <a href="{{ url('/listings', $listing->id) }}">編集</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
