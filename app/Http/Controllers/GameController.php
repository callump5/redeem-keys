<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

use App\Models\Platform;
use App\Models\Collection;
use App\Models\Category;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $args = [
            'pageTitle' => "All Games",
            'model' => 'App\Models\Game'
        ];

        return view('pages.adminarea.crud.list', $args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //

        $args = [
            'pageTitle' => "All Games",
            'game' => $game
        ];

        return view('pages.adminarea.crud.view', $args);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {

        $args = [
            'pageTitle' => "Edit: " .$game->name,
            'game' => $game,
            'categories' => Category::all(),
            'platforms' => Platform::has('children')->get(),
            'collections' => Collection::all()
        ];

        return view('pages.adminarea.crud.edit', $args);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required',
            'platforms' => '',
            'collections' => '',
            'categories' => '',
            'description' => '',
            'cdkeys_link' => '',
            'cdkeys_price' => '',
            'g2a_link' => '',
            'g2a_price' => ''
        ]);

        $game->name = $validated['name'];
        $game->description = $validated['description'];
        $game->cdkeys_price = $validated['cdkeys_price'];
        $game->g2a_price = $validated['g2a_price'];
        $game->cdkeys_link = $validated['cdkeys_link'];
        $game->g2a_link = $validated['g2a_link'];

        $platforms = [];

        if(isset($validated['platforms'])){
            $platforms = Platform::whereIn('id', $validated['platforms'])->get();
        }
        $game->platforms()->sync($platforms);


        $game->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
