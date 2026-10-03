<?php

namespace App\Services;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AuditLogger
{
    public function __construct(protected ?Request $request = null)
    {
    }

    /**
     * Record an auditable action.
     */
    public function record(
        string $action,
        ?Model $subject = null,
        array $metadata = [],
        ?User $actor = null,
    ): AuditLog {
        return AuditLog::create([
            'actor_user_id' => $actor?->id ?? auth()->id(),
            'action' => $action,
            'subject_type' => $subject?->getMorphClass(),
            'subject_id' => $subject?->getKey(),
            'metadata' => $metadata ?: null,
            'ip_hash' => $this->hashClientIp(),
        ]);
    }

    /**
     * Privacy-aware hashed client IP (never store the raw IP).
     */
    protected function hashClientIp(): ?string
    {
        $ip = $this->request?->ip() ?? request()?->ip();

        if (! $ip) {
            return null;
        }

        return hash('sha256', $ip.'|'.config('app.key'));
    }
}
