<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Loan extends Model
{
    use HasFactory, LogsActivity;
    
    protected $fillable = [ 
        'code',
        'customer_id',
        'company_name',
        'work_duration',
        'monthly_salary',
        'loan_amount',
        'loan_term',
        'id_photo_path',
        'selfie_photo_path',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['customer_id','code'])
        ->useLogName('membuat permohonan baru');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function statuses()
    {
        return $this->hasMany(LoanStatus::class);
    }
}