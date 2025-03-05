<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Roles extends Model
{
    use HasUuids;
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['role', 'school_id'];

    public function schools(): BelongsTo {
        return $this->belongsTo(Schools::class, 'school_id');
    }
}
