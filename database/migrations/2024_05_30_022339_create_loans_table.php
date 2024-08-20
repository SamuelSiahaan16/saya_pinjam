<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('type_loan');
            // For Private Employees
            $table->string('company_name')->nullable();
            $table->integer('work_duration')->nullable();
        
            // For Civil Servants (PNS)
            $table->string('position')->nullable();
            $table->string('institution')->nullable();
        
            // For Vehicle Loans
            $table->string('car_type')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_year')->nullable();
            $table->string('car_license_plate')->nullable();
        
            // For Property Certificate Loans
            $table->string('property_type')->nullable();
            $table->string('certificate_type')->nullable();
            $table->string('property_address')->nullable();
            
            $table->double('monthly_salary');
            $table->double('loan_amount');
            $table->integer('loan_term');
            
            $table->string('id_photo_path');
            $table->string('selfie_photo_path');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};