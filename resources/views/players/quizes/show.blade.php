{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/svg" href="/images/logo.svg" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Login</title>
</head>

<body>
    <nav>
        {{-- <div class="logo"> {{ Auth::user()->name }} </div> --}}
        <div class="logo"> Pubquiz</div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            {{-- <li><a href="{{ route('home') }}">Home</a></li>
            <li><a class="active"href="{{ route('quizes') }}"> Quizes</a></li>
            <li><a href="#">Posts</a></li> --}}

            <li class="nav-item dropdown">




                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('players.logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('players.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div class="showQuizContainer">
        <img class="qr" id="qr"src="{{ $quiz->qr_path }}" alt="qr">
        <div class="showQuizCard">
            <div class="title">

                <h1>{{ $quiz->title }}</h1>
                <p>{{ $quiz->description }}</p>
            </div>
            <div class="date">

                <h1>Date: </h1>
                <p>{{ $quiz->date }}</p>
            </div>
            <div class="active">

                <h1>Active: </h1>
                <p>{{ $quiz->is_active == 1 ? 'Active' : 'Inactive' }}</p>
            </div>
            <div class="join">
                <a href="{{route('quizes.join', $quiz->id)}}" class="startQuiz">Join solo</a>
                <a href="{{route('teams.index', $quiz->id)}}" class="startQuiz">Join as team</a>
            </div>
           
            <button id="showQr"class="showQr">
                Show QR
            </button>
        </div>
    </div>
</body>
<script src="/js/cms.js"></script>

</html>
{{-- @section('content') --}}

{{-- @endsection --}}
