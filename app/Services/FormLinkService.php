<?php

namespace App\Services;
use App\Models\Form;
use Illuminate\Support\Str;

class FormLinkService
{
    public static function generate(array $data): string {

        $form = Form::create([
            'token' => Str::uuid(),
            'migration_id' => $data['migration_id'],
            'system_name' => $data['system_name'],
            'usuclin' => $data['usuclin'],
            'responsible' => $data['responsible'],
            'rapporteur' => $data['rapporteur'],
        ]);


            return route('form.show', [
            'token' => $form->token
        ]);
    }
}