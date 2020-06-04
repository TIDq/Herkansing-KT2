<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cursus;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index',compact('carts'));
    }
}
