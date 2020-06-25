@extends('layouts.master')

@section('title','Quize Name Edit')

@section('card-title','Quize Name Edit')

@section('content')
    <form action="{{ route('quize.update', $quize->id) }}" method="post">

        @csrf
        @method('patch')
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" value="{{ $quize->name }}">
        </div>

        @include('message_inc.error')

        <div>
            <button class="btn btn-primary" type="submit">Update Quize</button>
        </div>

    </form>
@endsection
