@extends('layouts.master')

@section('title', 'Регистрация')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf

                        <div class="form-group">
                            <label for="person_id">Номер студенческого билета</label>
                            <input id="person_id" type="text" class="form-control @error('person_id') is-invalid @enderror" name="person_id" value="{{ old('person_id') }}" required autocomplete="student_id" autofocus>
                            @error('person_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="admission_year">Год поступления</label>
                            <input id="admission_year" type="text" class="form-control @error('admission_year') is-invalid @enderror" name="admission_year" value="{{ old('admission_year') }}" required autocomplete="admission_year">
                            @error('admission_year')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Роль</label>
                            <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                <option value="student">Студент</option>
                                <option value="teacher">Преподаватель</option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
