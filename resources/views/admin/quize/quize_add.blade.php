@extends('layouts.master')

@section('title','Add Quize')

@section('card-title','Add Quize')

@section('content')
    <form action="{{ route('quize.store') }}" method="post">

        @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        @include('message_inc.error')

        <div>
            <button class="btn btn-primary" type="submit">Create Quize</button>
        </div>

    </form>
@endsection
