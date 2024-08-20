<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formPinKarySwas()
    {
        $provinces = Province::with('cities')->get();
        return view ('page.form.form-pinKarySwas', compact('provinces'));
    }

    public function formPinJamTor()
    {
        $provinces = Province::with('cities')->get();
        return view ('page.form.form-pinJamTor', compact('provinces'));
    }

    public function formPinJamTan()
    {
        $provinces = Province::with('cities')->get();
        return view ('page.form.form-pinJamTan', compact('provinces'));
    }

    public function formPinGuPns()
    {
        $provinces = Province::with('cities')->get();
        return view ('page.form.form-pinGuPns', compact('provinces'));
    }

    public function formPinPegNeg()
    {
        $provinces = Province::with('cities')->get();
        return view ('page.form.form-pinPegNeg', compact('provinces'));
    }
}