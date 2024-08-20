<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id', 
        'status', 
        'remarks', 
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}