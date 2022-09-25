<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LoanCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
