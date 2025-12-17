<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Form::query();
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));

        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('answered')) {
            if ($request->answered === 'yes') {
                $query->whereNotNull('overall_satisfaction');
            } elseif ($request->answered === 'no') {
                $query->whereNull('overall_satisfaction');
            }

        }

        $averageSatisfaction = (clone $query)
        ->whereNotNull('overall_satisfaction')
        ->avg('overall_satisfaction');

        $averagePercentage = round(($averageSatisfaction / 5) * 100, 2);
        $forms = $query->latest()->paginate(10)->withQueryString();
        return view('administration.forms.index', compact('forms', 'averagePercentage'));
    }

    public function showForm($id)
    {
        $form = Form::findOrFail($id);
        return view('administration.forms.formDetails', compact('form'));
    }

    public function export(Request $request)
    {
        $query = Form::query();

        // Mesmos filtros da listagem
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('answered')) {
            if ($request->answered === 'yes') {
                $query->whereNotNull('overall_satisfaction');
            }

            if ($request->answered === 'no') {
                $query->whereNull('overall_satisfaction');
            }
        }

        $forms = $query->get();

        $averageSatisfaction = (clone $query)
            ->whereNotNull('overall_satisfaction')
            ->avg('overall_satisfaction');

        $averagePercentage = round(($averageSatisfaction / 5) * 100, 2);

        return response()->streamDownload(function () use ($forms, $averagePercentage) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Usuclin',
                'Sistema',
                'Migração',
                'Respondido',
                'Satisfação Geral',
                'Comentário',
                'Data',

            ]);

            foreach ($forms as $form) {
                fputcsv($handle, [
                    $form->usuclin,
                    $form->system_name,
                    $form->migration_id,
                    $form->overall_satisfaction ? 'Sim' : 'Não',
                    $form->overall_satisfaction,
                    $form->comments,
                    $form->created_at->format('d/m/Y'),
                ]);
            }

            fputs($handle, "Media de Satisfação Geral: ,".$averagePercentage."\n");

            fclose($handle);
        }, 'formularios.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

}
