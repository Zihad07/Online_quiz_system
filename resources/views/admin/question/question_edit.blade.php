@extends('layouts.master')

@section('title','Question Edit')

@section('card-title','Question Edit')

@section('content')
    <h3>Quize : {{ $question->quize->name }}</h3>
    @include('admin_elements.question_button',['quize'=>$question->quize])
    @include('message_inc.success')
    @include('message_inc.error')
    <form class="mt-2" action="{{ route('question.update', ['quize'=>$question->quize->id, 'question'=>$question->id]) }}" method="post">

        @csrf
{{--        @method('PATCH')--}}

        <div class="form-group">
            <textarea name="question" id="question" cols="20" rows="5" class="form-control">{{ $question->question }}</textarea>
        </div>

        <div class="form-group">
            <div class="row">
                @foreach($question->answers as $option)
                    <div class="col-md-6 mb-md-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <input type="hidden" name="id[]" value="{{$option->id}}">
                                <div class="input-group-text">
                                    <input type="checkbox" {{$option->is_correct==1 ? 'checked' : ''}} name="answers[]" value="{{ $loop->index }}" aria-label="Radio button for following text input" >
                                </div>
                            </div>
                            <input type="text" name="options[]" value="{{ $option->answer }}" class="form-control" aria-label="Text input with radio button" placeholder="option-0">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <div>
            <button class="btn btn-primary" type="submit">Question Update</button>
        </div>

    </form>
@endsection
