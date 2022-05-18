@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <h1>View Form's Answers</h1>
        <h2>Form "{{$form['title']}}"</h2>
        <p class="lead">Here you may observe answers of the form.</p>
    </div>

    <table class="table">
        <thead>
        <tr>
            @foreach($fields as $field)
                <th scope="col">{{$field->title}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($answers as $answer)
                <td>{{$answer->data}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
@endsection
