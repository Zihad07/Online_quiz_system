@extends('layouts.master')

@section('title','Result | Users')

@section('card-title','Result')

@section('content')

    <h3>Result Summary <a href="{{route('result.download')}}" class=" btn btn-sm btn-info">Result Download</a></h3>
    @include('message_inc.success')

    <div class="question mt-2">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Quize</th>
                <th class="text-success">Right Answer</th>
                <th class="text-danger">Wrong Answer</th>
                <th class="text-info">Get Points</th>
                <td>Created</td>
            </tr>
            </thead>

            <tbody>
            @forelse($results as $result)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->email }}</td>
                    <td>{{ $result->quize_name }}</td>
                    <td class="text-green">{{ $result->right_answer }}</td>
                    <td class="text-red">{{ $result->wrong_answer }}</td>
                    <td class="text-dark">{{ $result->get_points }}</td>
                    <td>{{ $result->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <th>There is no result set yet....</th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
