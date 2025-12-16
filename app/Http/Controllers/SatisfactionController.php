<?php

namespace App\Http\Controllers;

use App\Models\Satisfaction;
use Illuminate\Http\Request;

class SatisfactionController extends Controller
{
    public function show($token)
    {
        $satisfaction = Satisfaction::where('token', $token)->firstOrFail(); #busca o registro pelo token ou erro 404 se nao encontrar

        if ($satisfaction->submitted_at) {
            return view('satisfaction.already_submitted'); #se ja tiver sido preenchido, mostra a view de ja preenchido
        }
        return view('satisfaction.form', compact('satisfaction'));

    }

    public function save($token, Request $request)
    {

        $satisfaction = Satisfaction::where('token', $token)->firstOrFail();
        if ($satisfaction->submitted_at) {
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
        $satisfaction->update([
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

/* Incluir um novo registro de satisfação com tiker (exemplo de uso)
use App\Models\Satisfaction;
use Illuminate\Support\Str;

Satisfaction::create([
    'migration_id' => 'MIGD-02',
    'system_name' => 'PersonalMed',
    'usuclin' => 4956,
    'token' => Str::uuid(),
]);
*/