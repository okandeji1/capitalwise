<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saving extends Model
{
    use HasFactory, SoftDeletes;

    public function savingsCategory()
    {
        return $this->belongsTo(SavingsCategory::class, 'category_id');
    }
}
