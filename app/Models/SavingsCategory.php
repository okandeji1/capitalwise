<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavingsCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
}
