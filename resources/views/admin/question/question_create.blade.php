@extends('layouts.master')

@section('title','Question Create')

@section('card-title','Question Create')

@section('content')
    <h3>Quize : {{ $quize->name }}</h3>
    @include('message_inc.success')
    @include('message_inc.error')
    <form action="{{ route('question.store',$quize->id) }}" method="post">

        @csrf
        <div class="form-group">
            <textarea name="question" id="question" cols="20" rows="5" class="form-control">{{ old('question') }}</textarea>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-6 mb-md-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="answers[]" value="0" aria-label="Radio button for following text input" >
                            </div>
                        </div>
                        <input type="text" name="options[]" value="{{ old('options.0') }}" class="form-control" aria-label="Text input with radio button" placeholder="option-0">
                    </div>
                </div>
                <div class="col-md-6 mb-md-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="answers[]" value="1" aria-label="Radio button for following text input">
                            </div>
                        </div>
                        <input type="text" name="options[]" value="{{ old('options.1') }}" class="form-control" aria-label="Text input with radio button" placeholder="option-1">
                    </div>
                </div>
                <div class="col-md-6 mb-md-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="answers[]" value="2" aria-label="Radio button for following text input">
                            </div>
                        </div>
                        <input type="text" name="options[]" value="{{ old('options.2') }}" class="form-control" aria-label="Text input with radio button"  placeholder="option-2">
                    </div>
                </div>
                <div class="col-md-6 mb-md-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="answers[]" value="3" aria-label="Radio button for following text input">
                            </div>
                        </div>
                        <input type="text" name="options[]" value="{{ old('options.3') }}" class="form-control" aria-label="Text input with radio button"  placeholder="option-2">
                    </div>
                </div>



            </div>
        </div>



        <div>
            <button class="btn btn-primary" type="submit">Create Question</button>
        </div>

    </form>
@endsection
