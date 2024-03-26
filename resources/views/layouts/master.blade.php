<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/notification.css')}}">
</head>
<body>
<!-- Навигационная панель -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Портал УлГТУ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <!-- Ссылки для студентов -->
                @if(auth()->check() && auth()->user()->role === 'student')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.dashboard') }}">Личный кабинет</a>
                    </li>
                @endif
                <!-- Ссылки для преподавателей -->
                @if(auth()->check() && auth()->user()->role === 'teacher')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.dashboard') }}">Личный кабинет</a>
                    </li>
                @endif
                <!-- Ссылки для администратора -->
                @if(auth()->check() && auth()->user()->role === 'admin')

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Панель управления</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.groups.index') }}">Список групп</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.groups.create') }}">Добавить группу</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </ul>
            <div class="my-2 my-lg-0">
                @guest
                    <a class="btn btn-outline-primary mr-2" href="{{ route('login.form') }}">Вход</a>
                    <a class="btn btn-primary" href="{{ route('register.form') }}">Регистрация</a>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link">Выход</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('js/notification.js')}}"></script>
</body>
</html>
