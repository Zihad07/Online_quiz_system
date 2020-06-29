@extends('layouts.app')

@section('content')
    <exam-question :quize="{{ $quize->id }}" csrf="{{csrf_token()}}">></exam-question>
@endsection
