<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GameFormReqest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function upload_image($imageFile)
    {
        if ($imageFile) {
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

            $imageFile->move(public_path('uploads'), $imageName);

            return 'uploads/' . $imageName;
        }

        return null;
    }

    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameFormReqest $request)
    {
        $data = $request->all();
        if ($request->hasFile('cover_art')) {
            $data['cover_art'] =  $this->upload_image($request->file('cover_art'));
        }
        Game::create($data);
        return redirect()->route('games.index')->with('success', 'Game created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Game::find($id);
        // dd($game);
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameFormReqest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $game = Game::findOrFail($id);
            if ($request->hasFile('cover_art')) {
                $data['cover_art'] =  $this->upload_image($request->file('cover_art'));
                unlink($game->cover_art);
            }
            $game->update($data);
            DB::commit();
            return redirect()->route('games.index')->with('success', 'Game updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::find($id);
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully');
    }
}
