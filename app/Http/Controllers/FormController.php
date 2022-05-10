<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests\FormsRequest;
use App\Http\Resources\FormResource;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function index($form_uid)
    {
        $form = Form::where('uid', $form_uid)->firstOrFail();
        return view('forms.index')->with('form', $form)->with('fields', $form->fields);
    }

    public function show($form_uid)
    {
        return new FormResource(Form::where('uid', $form_uid)->firstOrFail());
    }

    public function store(FormsRequest $request)
    {
        $data = $request->validated();

        $data['uid'] = Str::uuid();
        $form = Form::create($data);

        Session::flash('success', 'Form is successfully saved!');

        return $this->index($form->uid);
    }

    public function destroy(Form $form)
    {
        $form->delete();
        Session::flash('info', 'Form is successfully deleted!');
        return route('forms.create');
    }
}
