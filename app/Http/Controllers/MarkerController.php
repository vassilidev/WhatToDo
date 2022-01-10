<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkerRequest;
use App\Models\Marker;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.marker.createMarker');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MarkerRequest $request
     * @return RedirectResponse
     */
    public function store(MarkerRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $marker = Auth::user()->markers()->create($validatedData);

        if ($validatedData['visibility'] === 'custom' && !empty($validatedData['followings'])) {
            $marker->invitedUsers()->attach($validatedData['followings']);
        }

        toast('Le marker a bien été créer !', 'success');

        return redirect()->route('profile', Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Marker $marker
     * @return \Illuminate\Http\Response
     */
    public function show(Marker $marker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Marker $marker
     * @return \Illuminate\Http\Response
     */
    public function edit(Marker $marker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Marker $marker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Marker $marker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marker $marker)
    {
        //
    }
}
