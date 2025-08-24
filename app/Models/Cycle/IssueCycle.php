<?php

namespace App\Models\Cycle;

use Illuminate\Database\Eloquent\Model;

class IssueCycle extends Model
{
    protected $table = 'issue_cycle';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function issues()
    {
        return $this->hasMany(IssueCycle::class);
    }
}
