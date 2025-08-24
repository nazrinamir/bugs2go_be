<?php

namespace App\Models\Cycle;

use Illuminate\Database\Eloquent\Model;

class BugCycle extends Model
{
    protected $table = 'bug_cycle';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'duration_days',
        'start_date',
        'end_date',
        'status ',
        'created_at',
        'updated_at',
    ];
}
