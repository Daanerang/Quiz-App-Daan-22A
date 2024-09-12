<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    // Start the game or load the saved game
    public function start()
    {
        // Create a new game or reset the existing game for the user
        $game = Game::updateOrCreate(
            ['user_id' => Auth::id()],
            ['choices' => [], 'items' => [], 'current_stage' => 'intro']
        );

        return view('game', ['game' => $game]);
    }

    // Progress through stages
    public function progress(Request $request)
    {
        $game = Game::where('user_id', Auth::id())->first();

        // Save player choices
        $choices = $game->choices;
        $choices[$game->current_stage] = $request->input('choice');
        $game->choices = $choices;

        // Save items if picked up
        if ($request->has('item')) {
            $items = $game->items;
            if (!in_array($request->input('item'), $items)) {
                $items[] = $request->input('item');
            }
            $game->items = $items;
        }

        // Move to the next stage
        $game->current_stage = $request->input('next_stage');
        $game->save();

        return view('game', ['game' => $game]);
    }
    
}
