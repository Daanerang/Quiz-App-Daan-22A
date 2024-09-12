@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Text-Based Adventure Game</title>
        <!-- Include Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">Spy Adventure</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('game.start') }}">Play Game</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
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
                <p>This is a text-based adventure game. At each stage, you will be presented with choices that will affect
                    the
                    outcome of the game. Use the navigation bar to start the game or log in if you are a returning player.
                </p>
            </div>
        </div>
        <!-- Hero Section -->
        <div class="hero-section">
        @endsection
