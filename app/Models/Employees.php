<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Employees extends Model
{
    use HasUuids;

    protected $table = 'employees';
    protected $fillable = ['name', 'school_id', 'role_id'];

    public function schools(): BelongsTo {
        return $this->belongsTo(Schools::class, ['school_id']);
    }

    public function roles(): HasOneOrMany {
        return $this->hasOneOrMany(Roles::class, ['role_id']);
    }
}
