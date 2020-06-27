@extends('layouts.master')

@section('title','Question')

@section('card-title','All Question')

@section('content')

    <h3>Quize : {{ $quize->name }}</h3>
    @include('admin_elements.question_button')
    @include('message_inc.success')

    <div class="question mt-2">
        <table class="table">
            <thead>
            <tr>
                <th>Question</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @forelse($quize->questions as $question)
                <tr>
                    <td colspan="6"> {{ $question->question }}</td>
                    <td><a href="{{ route('question.edit', ['quize' => $quize->id, 'question' => $question->id]) }}" class="btn btn-secondary">Edit</a></td>

                    <td>
                        <form action="{{route('question.delete', ['quize' => $quize->id, 'question' =>$question->id])}}" method="post">
                            @csrf
                            @method('delete')
                                                           @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th>There is no questions setup yet....</th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
