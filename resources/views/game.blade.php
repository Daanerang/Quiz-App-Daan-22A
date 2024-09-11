@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Spy Adventure</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/game') }}">Start Game</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Spy Adventure</h1>

    @if ($game->current_stage == 'intro')
        <p>You are the world-famous spy Axel Huntington. Your mission is to infiltrate the Russian base in Siberia and
            execute a scientist named Pavlov who is close to perfecting his mind control serum. The base seems to be very
            secluded with several entrances and lots of guards. However, there seem to be three ways to get inside.</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="climb_wall">
            <button name="choice" value="climb">Climb the wall</button>
            <input type="hidden" name="next_stage" value="walk_gate">
            <button name="choice" value="gate">Walk through the front gate</button>
            <input type="hidden" name="next_stage" value="hide_convoy">
            <button name="choice" value="convoy">Hide under an incoming supply convoy</button>
        </form>
    @elseif ($game->current_stage == 'climb_wall')
        <p>You successfully climb over the wall and find yourself in a secluded area behind the base. You can see a few
            guards patrolling. however you also see a guard sitting near a campfire. What will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="avoid_guards">
            <button name="choice" value="hide">Hide in the shadows and you sneak in through the backdoor.</button>
            <input type="hidden" name="next_stage" value="take_out">
            <button name="choice" value="sneak_in">Take out the guard sitting by the campfire and take his uniform</button>
        </form>
    @elseif ($game->current_stage == 'avoid_guards')
        <p>You manage to avoid the guards and sneak in through the backdoor. You find yourself in the warehouse, but you
            need to get to the main area. What will you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="find_a_exit">
            <button name="choice" value="find_a_exit">Start looking for an exit</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="explore_area">
            <button name="choice" value="explore_area">Explore the area in the hope of finding something useful</button>
        </form>
    @elseif ($game->current_stage == 'take_out')
        <p>You take out the guard and take his uniform. You manage to sneak past the guards and find yourself in the main
            hall of the base. What will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="choose_item">
            <button name="choice" value="explore_base">Explore the base</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="head_to_target">
            <button name="choice" value="head_to_target">Head straight to your target</button>
        </form>
    @elseif ($game->current_stage == 'walk_gate')
        <p>You walk to the front gate but ofcourse you get spotted what will you do now?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="surrender_guards">
            <button name="choice" value="inspect">You surrender in the hope they get you inside</button>
            <input type="hidden" name="next_stage" value="shoot_guards">
            <button name="choice" value="meet">You shoot the guards</button>
        </form>
    @elseif ($game->current_stage == 'surrender_guards')
        <p>You surrender to the guards. They take you inside the base and lock you up in a cell. You are unable to escape
            and the mission is a failure.</p>
        <form action="{{ route('game.start') }}" method="GET">
            <button>Restart Game</button>
        </form>
    @elseif ($game->current_stage == 'shoot_guards')
        <p>You shoot the guards and manage to get inside the base. You find yourself in the main hall of the base. What
            will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="choose_item">
            <button name="choice" value="explore_base">Explore the base</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="head_to_target">
            <button name="choice" value="head_to_target">Head straight to your target</button>
        </form>
    @elseif ($game->current_stage == 'hide_convoy')
        <p>You hide under the convoy and are successfully transported inside the base. You now arrive inside the warehouse,
            but you need to get to the main area. What will you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="find_a_exit">
            <button name="choice" value="find_a_exit">Start looking for an exit</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="explore_area">
            <button name="choice" value="explore_area">Explore the area in the hope of finding something useful</button>
        </form>
    @elseif ($game->current_stage == 'find_a_exit')
        <p>There’s an open door in the warehouse. After going through it, you enter a hallway. There seems to be a guard at
            the end
            of the hallway with his back to you. What will you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="attack_guard">
            <button name="choice" value="attack_guard">Attack the guard</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="explore_area">
            <button name="choice" value="explore_area">Walk back to the warehouse and look for something to pass the
                guard</button>
        </form>
    @elseif ($game->current_stage == 'attack_guard')
        <p>You swiftly take out the guard and go through the door. Once behind that door, there's a large open area with a
            laboratory. There are several scientists in there, but they spot you along with the guards. What do you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="throw_a_grenade">
            <button name="choice" value="throw_grenade">Throw a grenade</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="shoot_everyone_in_the_lab">
            <button name="choice" value="shoot">Grab your weapon and shoot at everyone in the lab, hoping to kill Pavlov
                in time</button>
        </form>
    @elseif ($game->current_stage == 'shoot_everyone_in_the_lab')
        <p>You start shooting at everyone in the lab. You manage to kill a few guards and scientists, but Pavlov escapes
            through a secret door. You are now surrounded by guards. What will you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="fight">
            <button name="choice" value="fight">Fight your way out</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="surrender">
            <button name="choice" value="surrender">Surrender and hope for the best</button>
        </form>
    @elseif ($game->current_stage == 'surrender')
        <p>You surrender to the guards. They take you to a cell where you are locked up. You are unable to escape and the
            mission is a failure.</p>
        <form action="{{ route('game.start') }}" method="GET">
            <button>Restart Game</button>
        </form>
    @elseif ($game->current_stage == 'fight')
        <p>You fight your way out of the lab, taking down several guards. You manage to escape the lab and find yourself
            in the main hall of the base. What will you do next?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="choose_item">
            <button name="choice" value="explore_base">Explore the base</button>
        </form>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="head_to_target">
            <button name="choice" value="head_to_target">Head straight to your target</button>
        </form>
    @elseif ($game->current_stage == 'head_to_target')
        <p>You head straight to the target room. You find Pavlov working on his serum. What will you do?</p>
        <form action="{{ route('game.progress') }}" method="POST">
            @csrf
            <input type="hidden" name="next_stage" value="kill_pavlov">
            <button name="choice" value="kill_pavlov">Kill Pavlov and destroy the serum</button>
        </form>
    @elseif ($game->current_stage == 'destroy_serum')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You manage to destroy the serum and capture Pavlov. You then make your way out of the base.
                Mission accomplished.</p>
            <form action="{{ route('game.start') }}" method="GET">
                <button type="submit" class="btn btn-primary">Restart Game</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'kill_pavlov')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You kill Pavlov and destroy the serum. You then make your way out of the base. Mission
                accomplished.</p>
            <form action="{{ route('game.start') }}" method="GET">
                <button type="submit" class="btn btn-primary">Restart Game</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'explore_area')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You find a guard’s uniform. Do you want to put it on?</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="wear_disguise">
                <button type="submit" class="btn btn-info" name="choice" value="wear_disguise">Wear the
                    disguise</button>
            </form>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="skip_disguise">
                <button type="submit" class="btn btn-info" name="choice" value="skip_disguise">Continue without the
                    disguise</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'wear_disguise')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You wear the guard’s uniform and manage to sneak past the guards. You find yourself in the
                main hall of the base. What will you do next?</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="choose_item">
                <button type="submit" class="btn btn-info" name="choice" value="explore_base">Explore the
                    base</button>
            </form>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="head_to_target">
                <button type="submit" class="btn btn-info" name="choice" value="head_to_target">Head straight to your
                    target</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'skip_disguise')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You decide to skip the disguise and try to sneak past the guards. Unfortunately, you are
                spotted and the guards raise the alarm. You are captured and the mission is a failure.</p>
            <form action="{{ route('game.start') }}" method="GET">
                <button type="submit" class="btn btn-primary">Restart Game</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'main_hall')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You are in the main hall of the enemy's base. What do you want to do?</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="choose_item">
                <button type="submit" class="btn btn-info" name="choice" value="explore_base">Explore the
                    base</button>
            </form>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="head_to_target">
                <button type="submit" class="btn btn-info" name="choice" value="head_to_target">Head straight to your
                    target</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'choose_item')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You see several items on the table. Which one will you take?</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="final_mission">
                <button type="submit" class="btn btn-secondary" name="item" value="key_card">Take the key
                    card</button>
            </form>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="final_mission">
                <button type="submit" class="btn btn-secondary" name="item" value="weapon">Take the weapon</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'final_mission')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You reach the final room with your items:
                @foreach ($game->items as $item)
                    {{ $item }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </p>
            <p class="mb-4">Prepare for the final mission!</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="head_to_target">
                <button type="submit" class="btn btn-info" name="choice" value="head_to_target">Head straight to your
                    target</button>
            </form>
            <p class="mb-2">Or</p>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="explore_base">
                <button type="submit" class="btn btn-info" name="choice" value="explore_base">Explore the
                    base</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'throw_a_grenade')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You throw the grenade but during the explosion, it also damages some highly explosive
                equipment, creating a chain reaction. Where do you take cover?</p>
            <form action="{{ route('game.progress') }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="next_stage" value="hide_behind_door">
                <button type="submit" class="btn btn-danger" name="choice" value="hide_behind_door">Hide behind the
                    lab door</button>
            </form>
            <form action="{{ route('game.progress') }}" method="POST">
                @csrf
                <input type="hidden" name="next_stage" value="run_away">
                <button type="submit" class="btn btn-danger" name="choice" value="run_away">Run away in the hope of
                    escaping</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'hide_behind_door')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You hide behind the lab door, but the explosion is too powerful. The chain reaction from the
                equipment's explosion causes the entire lab to collapse, and you are caught in the blast. Unfortunately, you
                do not survive the explosion. Mission failed.</p>
            <form action="{{ route('game.start') }}" method="GET">
                <button type="submit" class="btn btn-primary">Restart Game</button>
            </form>
        </div>
    @elseif ($game->current_stage == 'run_away')
        <div class="bg-light p-4 rounded shadow-sm">
            <p class="mb-4">You sprint away from the explosion. As you run through the corridors, you hear the massive
                explosion behind you. The entire base is engulfed in flames and debris. You manage to escape the destruction
                and survive. Mission accomplished.</p>
            <form action="{{ route('game.start') }}" method="GET">
                <button type="submit" class="btn btn-primary">Restart Game</button>
            </form>
        </div>
    @endif

@endsection
