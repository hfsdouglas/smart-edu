<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasUuids;

    protected $table = 'schools';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
