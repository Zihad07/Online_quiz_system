@extends('layouts.app')

@section('content')
    <exam-question quize_name="{{ $quize->name }}" :quize="{{ $quize->id }}" csrf="{{csrf_token()}}">></exam-question>
@endsection
