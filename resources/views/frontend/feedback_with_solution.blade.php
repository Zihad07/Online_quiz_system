@extends('layouts.app')

@section('content')
    <div class="card card-body">
        <div class="card card-body text-center text-gray-dark">
            <h3>Quize : {{ $result->quize_name }}</h3>
            <Strong>Name : {{ $result->name }}</Strong>
            <Strong>Email : {{ $result->email }}</Strong>

        </div>
        <div class="d-flex justify-content-around">
            <div type="button" class="btn btn-primary">
                Correct <span class="badge badge-light">{{ $result->right_answer }}</span>
            </div>

            <div type="button" class="btn btn-danger">
                Wrong <span class="badge badge-light">{{ $result->wrong_answer }}</span>
            </div>
        </div>

        <hr>
        <div>
            <h3 class="text-center">Fix with Correct answer</h3>

            @forelse($fix_answer as $question)
                <div
                    class="p-3 bg-gray-dark text-white
                    d-flex justify-content-between align-items-center

                    @if(!$loop->last) mb-1 @endif
                    "

                    style="border-radius: 10px;"

                >
                    <span>{{ $question->question }}</span>
                    <span>Answer : {{ $question->answer }}</span>
                </div>
            @empty
                <p class="text-center text-primary">No Answer is wrong</p>
            @endforelse

            <a href="{{ route('user.home') }}" class="btn btn-outline-primary mt-2">Go Back Home</a>
        </div>
    </div>
@endsection
