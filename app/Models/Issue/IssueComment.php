<?php

namespace App\Models\Issue;

use Illuminate\Database\Eloquent\Model;

class IssueComment extends Model
{
    protected $table = 'issue_comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'issue_id',
        'comment',
        'created_at',
        'updated_at',
    ];
}