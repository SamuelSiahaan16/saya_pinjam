<?php

namespace App\Http\Controllers;
 
use App\Models\Loan;
use App\Models\LoanStatus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        return view ('page.home');
    }

    public function about() 
    {
        return view ('page.about');
    }

    public function status()
    { 
        return view('page.cek-status');
    }
    
    public function cekStatus(Request $request)
    { 
        $code = $request->code;  
        
        $code = Loan::where('code', $code)->with(['statuses' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->latest('updated_at')->first();
    
        if (!$code) {
            return redirect()->route('cekstatus')->with('error', 'Kode pesanan tidak ditemukan.');
        }
        
        return view('page.cek-status', compact('code'));
    }

    

    public function pinKarySwas()
    {     
        return view('page.produk.pinKarySwas');
    }

    public function pinJamTor()
    {
        return view ('page.produk.pinJamTor');
    }

    public function pinJamTan()
    {
        return view ('page.produk.pinJamTan');
    }

    public function pinGuPns()
    {
        return view ('page.produk.pinGuPns');
    }

    public function pinPegNeg()
    {
        return view ('page.produk.pinPegNeg');
    }
}