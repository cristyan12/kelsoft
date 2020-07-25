<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController
{
    public function index()
    {
        $beneficiaries = [];

        return view('beneficiaries.index', compact('beneficiaries'));
    }

    public function create()
    {
        return view('beneficiaries.create');
    }

    public function store(Request $request)
    {
        $beneficiary = Beneficiary::create($request->all());

        return redirect()->route('beneficiaries.index');
    }
}
