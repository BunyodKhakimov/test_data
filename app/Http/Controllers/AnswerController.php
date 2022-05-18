<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        Log::info($data['request']);
        unset($data['request']['_token']);
        unset($data['request']['_method']);

        foreach($data['request'] as $field_id => $data)
        {
            $answer = Answer::create(['field_id' => $field_id, 'data' => $data]);
            Log::info($answer);
        }

        return response(200);
    }

    public function show($form_uid)
    {
        $form = Form::where('uid', $form_uid)->firstOrFail();
        return view('answers.show')->with('form', $form)->with('fields', $form->fields)->with('answers', $form->answers);
    }
}
