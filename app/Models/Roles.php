<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Roles extends Model
{
    use HasUuids;

    protected $table = 'roles';
    protected $fillable = ['role', 'school_id'];

    public function school(): BelongsTo {
        return $this->belongsTo(Schools::class);
    }
}
