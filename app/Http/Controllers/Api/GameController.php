<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return response()->json([
            'result' => true,
            'message' => 'success',
            'data' => $games
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('cover_art')) {
            $data['cover_art'] =  $this->upload_image($request->file('cover_art'));
        }
        Game::create($data);
        return response()->json([
            'result' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            return response()->json([
                'result' => true,
                'message' => 'success',
                'data' => $game
            ]);
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
        $game = Game::findOrFail($id);
        $game->delete();
        return response()->json([
            'result' => true,
            'message' => 'success',
        ]);
    }
}
