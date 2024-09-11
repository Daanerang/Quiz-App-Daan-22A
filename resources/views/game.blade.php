@extends('layouts.app')

@section('content')
    <h1>Spy Adventure</h1>

    @if ($game->current_stage == 'intro')
        <p>You are a spy on a mission. You have just infiltrated the enemy's base. What will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="disguise">
            <button name="choice" value="sneak_in">Sneak in quietly</button>
            <button name="choice" value="find_disguise">Find a disguise</button>
        </form>
    @elseif ($game->current_stage == 'disguise')
        <p>You found a guard's uniform. Do you want to put it on?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="main_hall">
            <button name="choice" value="wear_disguise">Wear the disguise</button>
            <button name="choice" value="skip_disguise">Continue without the disguise</button>
        </form>
    @elseif ($game->current_stage == 'main_hall')
        <p>You are in the main hall of the enemy's base. What do you want to do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="choose_item">
            <button name="choice" value="explore_base">Explore the base</button>
            <button name="choice" value="head_to_target">Head straight to your target</button>
        </form>
    @elseif ($game->current_stage == 'choose_item')
        <p>You see several items on the table. Which one will you take?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="final_mission">
            <button name="item" value="key_card">Take the key card</button>
            <button name="item" value="weapon">Take the weapon</button>
        </form>
    @elseif ($game->current_stage == 'final_mission')
        <p>You reach the final room with your items:
            @foreach ($game->items as $item)
                {{ $item }},
            @endforeach
        </p>
        <p>Prepare for the final mission. What will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="end">
            <button name="choice" value="fight">Fight your way out</button>
            <button name="choice" value="sneak_out">Sneak out quietly</button>
        </form>
    @elseif ($game->current_stage == 'end')
        <p>The mission is complete. Good job, Agent!</p>
        <form action="{{ route('game.start') }}" method="GET">
            <button>Restart Game</button>
        </form>
    @endif
@endsection
