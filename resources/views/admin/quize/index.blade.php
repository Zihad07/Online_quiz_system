@extends('layouts.master')

@section('title','Quize')

@section('card-title','All Queize')

@section('content')

    <a href="{{ route('quize.create') }}" class="btn btn-primary">Create Quize</a>
    @include('message_inc.success')

    <div class="quize mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Quize-name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
               @forelse($quizes as $quize)
                   <tr>
                       <td colspan="6"> {{ $quize->name }}</td>
                       <td><a href="{{ route('quize.edit',$quize->id) }}" class="btn btn-secondary">Edit</a></td>
                       <td><a href="{{ route('question.view', $quize->id) }}" class="btn btn-info">View</a></td>
                       <td><a href="{{ route('question.all', $quize->id) }}" class="btn btn-dark">Questions</a></td>
                       <td><a href="{{ route('question.create', $quize->id) }}" class="btn btn-outline-primary">Add Question</a></td>
                       <td>
                           <form action="{{route('quize.destroy', $quize->id)}}" method="post">
                               @csrf
                               @method('delete')
{{--                               @method('delete')--}}
                               <button type="submit" class="btn btn-danger">Delete</button>
                           </form>
                       </td>
                   </tr>
               @empty
                   <tr>
                       <th>There is no quize create yet....</th>
                   </tr>
               @endforelse
            </tbody>
        </table>
    </div>

@endsection
