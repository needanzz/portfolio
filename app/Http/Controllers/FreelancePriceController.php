<?php

namespace App\Http\Controllers;

use App\Models\FreelancePrice;
use Illuminate\Http\Request;

class FreelancePriceController extends Controller
{
    /**
     * Display a listing of freelance price packages.
     */
    public function index()
    {
        $packages = FreelancePrice::active()
            ->orderBy('order')
            ->get();

        return view('pages.freelance-price', compact('packages'));
    }
}
