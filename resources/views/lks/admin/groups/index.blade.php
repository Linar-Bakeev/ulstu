@extends('layouts.master')

@section('title', 'Список групп')

@section('content')
    <div class="container">
        <h1>Список групп</h1>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    @forelse($groups as $group)
                        <li class="list-group-item">{{ $group->name }}</li>
                    @empty
                        <li class="list-group-item">Нет доступных групп</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <hr>
        <div id="notification" class="notification hidden">Группа успешно добавлена</div>
    </div>
@endsection
