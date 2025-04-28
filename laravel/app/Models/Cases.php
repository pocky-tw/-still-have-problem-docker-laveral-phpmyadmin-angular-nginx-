<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'party_go_cases';

    protected $fillable = [
        'name',
        'need_exp',
        'point_reward',
        'experience_reward',
        'fame_reward',
        'point_penalty',
        'partial_experience_reward',
        'fame_penalty',
    ];
}
