<?php

namespace App\Http\Controllers;

use App\Field;
use App\Form;
use App\Http\Requests\FieldRequest;
use App\Http\Resources\FieldResource;
use Illuminate\Support\Facades\Session;

class FieldController extends Controller
{
    public function index($uid)
    {
        $form = Form::where('uid', $uid)->firstOrFail();
        return view('forms.index')->with('form', $form)->with('fields', $form->fields);
    }

    public function show(Field $field)
    {
        return new FieldResource($field);
    }

    public function store(FieldRequest $request, $form_uid)
    {
        $data = $request->validated();
        $data['form_uid'] = $form_uid;
        $field = Field::create($data);

        Session::flash('success', 'Field ' . $field->title . ' is successfully created!');

        return $this->index($form_uid);
    }

    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        $field->delete();

        Session::flash('info', 'Field ' . $field->title . ' is successfully deleted!');

        return redirect()->back();
    }
}
