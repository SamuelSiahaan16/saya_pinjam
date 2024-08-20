<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Rules\Recaptcha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function storePin(Request $request)
    { 

        // dd($request->input('g-recaptcha-response'));
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'occupation' => 'required|string',
            'id_number' => 'required|string',
            'phone_number' => 'required|string',
            'mother_name' => 'required|string',
            'city_district' => 'required|string',
            'type_loan' => 'required|string',
            'g-recaptcha-response' => ['required', 'string', new Recaptcha],
            'agreement' =>'required', 
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // dd($request->all());
        
        $customer = new Customer();
        $customer->full_name = $request->full_name;
        $customer->occupation = $request->occupation;
        $customer->id_number = $request->id_number;
        $customer->phone_number = $request->phone_number;
        $customer->mother_name = $request->mother_name;
        $customer->city_district = $request->city_district;
        $customer->date_birthday = $request->date_birthday;
        $customer->save();
        
        switch ($request->type_loan) {
            case 'Karyawan Swasta':
                $loanFields = [
                    'company_name' => 'required',
                    'work_duration' => 'required',
                ];
                break;
            case 'Agunan Kendaraan':
                $loanFields = [
                    'car_type' => 'required',
                    'car_brand' => 'required',
                    'car_model' => 'required',
                    'car_year' => 'required',
                    'car_license_plate' => 'required',
                ];
                break;
            case 'Agunan Sertifikat':
                $loanFields = [
                    'property_type' => 'required',
                    'certificate_type' => 'required',
                    'property_address' => 'required',
                ];
                break;
            case 'Guru PNS':
                $loanFields = [
                    'company_name' => 'required',
                    'work_duration' => 'required',
                    'position' => 'required', 
                ];
                break;
            case 'Pegawai Negeri':
                $loanFields = [ 
                    'company_name' => 'required',
                    'work_duration' => 'required',
                    'position' => 'required', 
                    'institution' => 'required', 
                ];
                break;
            default:
                $loanFields = [];
                break;
        }

        // Merge common and specific loan fields for validation
        $validator = Validator::make($request->all(), array_merge([
            'monthly_salary' => 'required',
            'loan_amount' => 'required',
            'loan_term' => 'required|integer',
            'id_photo_path' => 'required',
            'selfie_photo_path' => 'required',
        ], $loanFields));

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // Handle photo uploads
        $id_photo = request()->file('id_photo_path');
        $selfie_photo = request()->file('selfie_photo_path');

        $id_photo_name = 'id_photo_' . uniqid() . '.' . $id_photo->extension();
        $selfie_photo_name = 'selfie_' . uniqid() . '.' . $selfie_photo->extension();

        $id_photo_path = $id_photo->storeAs('public/id_photo', $id_photo_name);
        $selfie_path = $selfie_photo->storeAs('public/selfie', $selfie_photo_name);

        // Remove 'public/' prefix from the stored path
        $id_photo_path = str_replace('public/', '', $id_photo_path);
        $selfie_path = str_replace('public/', '', $selfie_path);

        // Generate unique code
        do {
            $randomCode = Str::random(12);
        } while (Loan::where('code', $randomCode)->exists());

        // Create new loan
        $loan = new Loan();
        $loan->code = $randomCode;
        $loan->customer_id = $customer->id;
        $loan->type_loan = $request->type_loan;

        // Assign specific loan fields
        foreach ($loanFields as $field => $rule) {
            $loan->{$field} = $request->{$field};
        }

        // Assign common loan fields
        $loan->monthly_salary = str_replace('.', '', $request->monthly_salary);
        $loan->loan_amount = str_replace('.', '', $request->loan_amount);
        $loan->loan_term = $request->loan_term;
        $loan->id_photo_path = $id_photo_path;
        $loan->selfie_photo_path = $selfie_path;
        $loan->save();

        // Simpan log status baru
        $loan->statuses()->create([
            'status' => 'Pending',
            'remarks' => 'Pengajuam Peminjaman',
        ]);

        $successData = [
            'code' => $loan->code,
            'type' => $loan->type_loan,
            'name' => $request->full_name,
        ];
 
        $url = route('form-success', ['data' => json_encode($successData)]);
 
        return response()->json([
            'alert' => 'success',
            'message' => 'Permintaan Berhasil Terkirim',
            'data' => $url
        ]);
    }

    public function success(Request $request)
    { 
        if (!$request->has('data')) { 
            abort(403);
        }
        
        $data = json_decode($request->get('data'), true); 
        
        return view('page.form.success', compact('data'));
    }
    
}