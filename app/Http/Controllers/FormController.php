<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Services\FormLinkService;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function createForm(Request $request)
    {

        $request->validate([
            'migration_id' => 'required|string',
            'system_name' => 'required|string',
            'usuclin' => 'required',
            'responsible' => 'nullable|string',
            'rapporteur' => 'nullable|string',
        ]);

        $link = FormLinkService::generate([
            'migration_id' => $request->migration_id,
            'system_name' => $request->system_name,
            'usuclin' => $request->usuclin,
            'responsible' => $request->responsible,
            'rapporteur' => $request->rapporteur,
        ]);

        return response()->json([
            'success' => true,
            'form_link' => $link
        ], 201);

    }
    public function show($token)
    {
        $form = Form::where('token', $token)->firstOrFail(); #busca o registro pelo token ou erro 404 se nao encontrar

        if ($form->submitted_at) {
            return view('satisfaction.already_submitted'); #se ja tiver sido preenchido, mostra a view de ja preenchido
        }
        return view('satisfaction.form', compact('form'));

    }

    public function save($token, Request $request)
    {

        $form = Form::where('token', $token)->firstOrFail();
        if ($form->submitted_at) {
            return view('satisfaction.already_submitted'); #se ja tiver sido preenchido, mostra a view de ja preenchido
        }

        # Validação dos dados recebidos no formulário
        $request->validate([
            'data_integrity' => 'required|integer|min:1|max:5',
            'delivery_time' => 'required|integer|min:1|max:5',
            'communication' => 'required|integer|min:1|max:5',
            'overall_satisfaction' => 'required|integer|min:1|max:5',
            'data_loss' => 'nullable|in:0,1',
            'comments' => 'nullable|string',
        ]);

        # salva os dados no banco de dados e marca como preenchido
        $form->update([
            'data_integrity' => $request->data_integrity,
            'delivery_time' => $request->delivery_time,
            'communication' => $request->communication,
            'overall_satisfaction' => $request->overall_satisfaction,
            'data_loss' => $request->data_loss,
            'comments' => $request->comments,
            'submitted_at' => now(),
        ]);

        return view('satisfaction.sucess');
    }


}
