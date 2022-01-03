@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form action="{{ url('/listings/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="listing" class="col-sm-3 control-label">リスト名</label>
                <div class="col-sm-6">
                    <input type="text" name="list_name" class="form-control" value="{{ $listing->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <input type="hidden" name="id" value="{{ $listing->id }}">
                        <i class="glyphicon glyphicon-plus"></i> 編集 </button>
                </div>
            </div>
        </form>
    </div>
@endsection
