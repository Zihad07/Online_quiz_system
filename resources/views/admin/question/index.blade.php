@extends('layouts.master')

@section('title','Quize')

@section('card-title','All Queize')

@section('content')

    <a href="{{ route('question.create', $quize->id) }}" class="btn btn-primary">Add Question</a>
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
                    <td><a href="" class="btn btn-secondary">Edit</a></td>

{{--                    <td>--}}
{{--                        <form action="{{route('quize.destroy', $quize->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            --}}{{--                               @method('delete')--}}
{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
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
