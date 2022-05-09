@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <h1>Index Page</h1>
        <h2>From "{{$form->title}}"</h2>
        <p class="lead">Below you can view form add fields.</p>
    </div>



    <div class="row g-5">
        <div class="col-md-5 col-lg-6">
            @if(isset($fields) && count($fields)>0)
                <h4 class="mb-3">Form Fields (Demo)</h4>
                @foreach($fields as $field)
                        @switch($field->type)
                            @case('input')
                                <label for="{{$field->title}}" class="form-label">{{$field->title}}</label>
                                <input type="text" class="form-control" id="{{$field->title}}" name="{{$field->title}}" placeholder="{{$field->description}}">
                            @break

                            @case('textarea')
                                <label for="{{$field->title}}" class="form-label">{{$field->title}}</label>
                                <textarea class="form-control" id="{{$field->title}}" name="{{$field->title}}" placeholder="{{$field->description}}" rows="3"></textarea>
                            @break

                            @case('select')
                                <label for="{{$field->title}}" class="form-label">{{$field->title}}</label>
                                <select class="form-select" aria-label="{{$field->title}}">
                                    <option selected>{{$field->description}}</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            @break

                            @default
                            <h4 class="mb-3">Field is broken :(</h4>
                        @endswitch

                        <form action="{{route('fields.destroy', $field->id)}}" method="post">
                            @csrf()
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
                        </form>
                    <hr class="my-4">
                @endforeach
            @else
                <h4 class="mb-3">No fields found!</h4>
            @endif
            <form action="{{route('forms.destroy', $form->uid)}}" method="post">
                @csrf()
                @method('DELETE')
                <button class="w-100 btn btn-danger btn-lg" type="submit">Delete Form</button>
            </form>
        </div>

        <div class="col-md-6 col-lg-5 order-md-last">
            <h4 class="mb-3">Create/Add Field</h4>
            <form method="post" action="{{ route('fields.store', $form->uid) }}">
                @csrf
                @method('POST')
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Name" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="e.g. Type your full name here" value="" required>
                    </div>
                </div>
                <hr class="my-4">

                <h4 class="mb-3">Type</h4>

                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="type" type="radio" class="form-check-input" value="input" checked required>
                        <label class="form-check-label" for="credit">Input</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="type" type="radio" class="form-check-input" value="textarea" required>
                        <label class="form-check-label" for="debit">Textarea</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="type" type="radio" class="form-check-input" value="select" required>
                        <label class="form-check-label" for="paypal">Select</label>
                    </div>
                </div>


                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Add Field</button>
            </form>
        </div>
    </div>
@endsection
