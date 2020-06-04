<?php

namespace App\Http\Controllers;

use App\Factuur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Uitvoering;
use App\Cursus;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UitvoeringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $uitvoeringen = Uitvoering::all();
        return view('uitvoering.index', compact('uitvoeringen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cursussen = Cursus::all();
        return view('uitvoering.create', compact('cursussen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        //Data Valideren
        $this->validate(
            $request, [
            'begin_tijd' => 'required',
            'eind_tijd' => 'required',
            'cursus_id' => 'required|exists:cursus,id'
        ]);

        //Data opslaan in database
        $uitvoering = new Uitvoering();
        $uitvoering->begin_datum = Carbon::parse($request->begin_tijd)->format('Y-m-d');
        $uitvoering->eind_datum = Carbon::parse($request->eind_tijd)->format('Y-m-d');
        $uitvoering->cursus_id = $request->cursus_id;


        //Data versuren naar een applicatie
        $uitvoering->save();

        return redirect()->route('uitvoering.index')->with('success', 'Uitvoering \''.$uitvoering->cursus->omschrijving.'\' aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $uitvoering = Uitvoering::findOrFail($id);
        return view('uitvoering.show', compact('uitvoering'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $uitvoering = Uitvoering::findOrFail($id);
        $cursussen = Cursus::all();
        return view('uitvoering.edit', compact('uitvoering', 'cursussen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
            'begin_tijd' => 'required',
            'eind_tijd' => 'required',
            'cursus_id' => 'required|exists:cursus,id'
        ]);

        $uitvoering = Uitvoering::where('id', '=', $id)->get()->first();

        //Data veranderen in database
        $uitvoering->begin_datum = Carbon::parse($request->begin_tijd)->format('Y-m-d');
        $uitvoering->eind_datum = Carbon::parse($request->eind_tijd)->format('Y-m-d');
        $uitvoering->cursus_id = $request->cursus_id;

        //Data versuren naar een applicatie
        $uitvoering->save();

        return redirect()->route('uitvoering.index')->with('success', 'Uitvoering is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Uitvoering::destroy($id);
        return redirect()->route('uitvoering.index')->with('success', 'Uitvoering verwijderd');
    }




    public function showCart()
    {
        if (!Session::get('cart'))
            Session::put('cart', []);
        return view('winkelwagen.index');
    }

    public function addToCart($id)
    {
        $uitvoering = Uitvoering::findOrFail($id);
        if (!Session::get('cart'))
            Session::put('cart', []);
        Session::push('cart', $id);
        return back()->with('success', $uitvoering->cursus->omschrijving .' toegevoegd aan mandje');
    }

    public function removeFromCart($index)
    {
        if (!Session::get('cart'))
            Session::put('cart', []);

        // if index exists in cart
        if(isset(Session::get('cart')[$index]))
        {
            $uitvoering = Uitvoering::findOrFail(Session::get('cart')[$index]);

            // remove index from cart and replace original cart with modified cart
            $cart = Session::get('cart');
            array_splice($cart, $index, 1);
            Session::put('cart', $cart);

            return back()->with('success', $uitvoering->cursus->omschrijving .' verwijderd uit het mandje');
        }
        return back();
    }

    /**
     * Clear the cart
     *
     * @param $id
     */
    public function emptyCart()
    {
        Session::forget('cart');
        return back()->with('success', 'Winkelmandje geleegd');
    }

    /**
     * Check out
     */
    public function checkout()
    {
        if (!Session::get('cart'))
            Session::put('cart', []);

        if(empty(Session::get('cart')))
            return back();

        $user_id = Auth::id() ?? null;
        $product_ids = implode(',', Session::get('cart'));

        $factuur = Factuur::create([
            'user_id' => $user_id,
            'product_ids' => $product_ids,
        ]);

        // empty cart
        Session::forget('cart');
        Session::put('cart', []);

        return redirect(url('/factuur/'.$factuur->id.'/show'))->with('success', 'Uw bestelling is geplaatst');
    }

}

