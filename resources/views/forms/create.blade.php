@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <h2>From Create</h2>
        <p class="lead">Below you can type title and create new form.</p>
    </div>

    <div class="row g-5">
        {{--    Form main   --}}
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Form</h4>
            <form method="post" action="{{ route('forms.store')}}">
                @csrf()
                @method('POST')
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Math Quiz" value="" required>
                        @error('title')
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4 w-50">

                <button class="w-50 btn btn-primary btn-lg" type="submit">Save</button>
            </form>
        </div>
    </div>

@endsection
