<?php

namespace App\Http\Controllers;

use App\Factuur;
use Illuminate\Http\Request;

class FactuurController extends Controller
{
    public function index($id)
    {
        $factuur = Factuur::findOrFail($id);
        return view('factuur.index', compact('factuur'));
    }
}
