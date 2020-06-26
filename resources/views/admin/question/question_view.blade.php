@extends('layouts.master')

@section('title','Question | view')

@section('card-title','All Question')

@section('content')

{{--    <a href="{{ route('question.create', $quize->id) }}" class="btn btn-primary">Add Question</a>--}}
    @include('message_inc.success')

    <div class="question-view mt-2">

        <div class="row">
            @forelse($questions as $question)

                <div class="card col-md-8 mx-auto">
                    <div class="card-title p-2">
                        {{ $loop->iteration }}. {{ $question->question }}
                        <hr class="mb-0">
                    </div>
                    <div class="card-body">

                        <ol>
                            @foreach($question->answers as $option)
                                <li>
                                    {{ $option->answer }}
                                    @if($option->is_correct==1) <span class="badge badge-success text-dark">Correct</span>@endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            @empty
                <div class="col-md-8 mx-auto">
                    <p>No question set yet.....</p>
                </div>
            @endforelse

            <div class="col-md-8 mx-auto">
{{--                {{ $questions->links() }}--}}
            </div>

        </div>
    </div>

@endsection
