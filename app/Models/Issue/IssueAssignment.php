<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssueAssignment extends Model
{
    // kalau table nama 'issue_assignments' ikut konvensyen, tak perlu property $table
    // protected $table = 'issue_assignments';

    protected $fillable = [
        'issue_id',
        'assigned_to',   // user_id penerima
        'assigned_by',   // user_id yang buat assign
        'assigned_at',   // bila assign dibuat
        'comment',       // catatan / alasan handover
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    // kalau tak nak guna created_at/updated_at (sebab guna assigned_at sendiri)
    public $timestamps = false;

    /* =======================
     | Relationships
     =======================*/

    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    /* =======================
     | Scopes berguna
     =======================*/

    public function scopeForIssue($query, int $issueId)
    {
        return $query->where('issue_id', $issueId);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('assigned_at');
    }

    /* =======================
     | Helper: log & update assignee
     =======================*/
    public static function reassign(Issue $issue, int $toUserId, int $byUserId, ?string $comment = null): self
    {
        // 1) rekod sejarah
        $log = self::create([
            'issue_id' => $issue->id,
            'assigned_to' => $toUserId,
            'assigned_by' => $byUserId,
            'assigned_at' => now(),
            'comment' => $comment,
        ]);

        // 2) update current assignee di issues table
        $issue->update(['assignee_id' => $toUserId]);

        return $log;
    }
}
