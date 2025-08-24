<?php

namespace App\Models\Cycle;

use App\Models\Issue\Issue;
use Illuminate\Database\Eloquent\Model;

class SprintCycle extends Model
{
    protected $table = 'sprint_cycle';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
