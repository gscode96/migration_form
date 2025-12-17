<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    #campos que podem ser preenchidos em massa de modo protegido
    protected $fillable = [
        'token',
        'migration_id',
        'system_name',
        'usuclin',
        'responsible',
        'rapporteur',
        'data_integrity',
        'delivery_time',
        'communication',
        'overall_satisfaction',
        'data_loss',
        'comments',
        'submitted_at',
    ];
}
