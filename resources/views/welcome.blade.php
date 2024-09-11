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

    <div class="container mt-4">
        <h1>Welcome to Spy Adventure</h1>
        <p>In Spy Adventure, you take on the role of a world-famous spy on a critical mission. Your objective is to
            infiltrate a high-security base, overcome various challenges, and complete your mission successfully. Choose
            your path wisely and see if you can achieve your goal!</p>

        <div class="mt-4">
            <h2>How to Play</h2>
            <p>This is a text-based adventure game. At each stage, you will be presented with choices that will affect the
                outcome of the game. Use the navigation bar to start the game or log in if you are a returning player.</p>
        </div>
    </div>

