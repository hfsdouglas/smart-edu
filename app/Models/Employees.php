<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employees extends Model
{
    use HasUuids;
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['name'];

    public function roles(): BelongsToMany {
        return $this->belongsToMany(
            Roles::class, 
            'employee_roles',
            'employee_id', 
            'roles_id'
        );
    }
}
