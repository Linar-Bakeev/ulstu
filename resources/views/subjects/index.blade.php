@extends('layouts.master')

@section('title', 'Список предметов')

@section('content')
    <h1>Список предметов</h1>
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach($subjects as $subject)
                    <li class="list-group-item">{{ $subject->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
