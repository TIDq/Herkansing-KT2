<?php

namespace App\Http\Controllers;

use App\Cursus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $cursus = Cursus::all()->sortBy('cursuscode');
        return view('cursus.index', compact('cursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cursus.create');
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
        $this->validate(
            $request, [
            'cursuscode' => 'required|min:1|unique:cursus,cursuscode,NULL,id,deleted_at,NULL',
            'omschrijving' => 'required',
            'prijs' => 'required',
        ]);

        $cursus = new Cursus;
        $cursus->cursuscode = $request->cursuscode;
        $cursus->omschrijving = $request->omschrijving;
        $cursus->prijs = $request->prijs;

        $cursus->save();

        return redirect()->route('cursus.index')->with('success', 'Cursus aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $cursus = Cursus::findOrFail($id);
        return view('cursus.show', compact('cursus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cursus = Cursus::findOrFail($id);
        return view('cursus.edit', compact('cursus'));

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
        //Data Valideren
        $this->validate(
            $request, [
            'cursuscode' => 'required|min:1|unique:cursus,cursuscode,NULL,id,deleted_at,NULL' . $id,
            'omschrijving' => 'required',
            'prijs' => 'required',
        ]);

        $cursus = Cursus::where('id', '=', $id)->get()->first();

        $cursus->cursuscode = $request->cursuscode;
        $cursus->omschrijving = $request->omschrijving;
        $cursus->prijs = $request->prijs;

        //Data versuren naar een applicatie
        $cursus->save();

        return redirect()->route('cursus.index')->with('success', 'Cursus is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Cursus::destroy($id);
          return redirect()->route('cursus.index')->with('success', 'Cursus verwijdert');
    }
}
