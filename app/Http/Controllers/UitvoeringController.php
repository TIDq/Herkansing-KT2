<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Uitvoering;
use App\Cursus;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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

        $uitvoeringen = Uitvoering::all()->sortBy('date');
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

        return redirect()->route('uitvoering.index')->with('success', 'Uitvoering '."'"."'".' aangemaakt');
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
        return view('uitvoering.edit', compact('uitvoering'));
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

        return redirect()->route('uitvoering.index')->with('success', 'Functie is aangepast');
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
        return redirect()->route('uitvoering.index')->with('success', 'Uitvoering verwijdert');
    }

    public function addToCart($id)
    {
        $uitvoering = Uitvoering::findOrFail($id);
        if (!Session::get('cart'))
            Session::put('cart', []);
        Session::push('cart', $id);
        return back()->with('success', $uitvoering->name .' toegevoegd aan mandje');
    }

    /**
     * Clear the cart
     *
     * @param $id
     */
    public function emptyCart()
    {
        Session::forget('cart');
        return back()->with('success', 'Cart Emptied');
    }

    /**
     * Check out
     */
    public function checkout()
    {

    }

}

