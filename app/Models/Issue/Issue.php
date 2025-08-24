<?php

namespace App\Models\Issue;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issue';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'bug_cycle_id',
        'title',
        'description',
        'steps_to_reproduce',
        'expected_result',
        'actual_result',
        'status',
        'evidence',
        'priority',
        'severity',
        'assignee_id',
        'reported_by',
        'created_at',
        'updated_at',
    ];
}
