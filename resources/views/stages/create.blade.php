@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un nouveau stage</h1>

        <form action="{{ route('stages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_id">Étudiant</label>
                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
                    <option value="">Sélectionner un étudiant</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
                @error('student_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_name">Nom de l'entreprise</label>
                <input type="text" name="company_name" id="company_name"
                    class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" name="start_date" id="start_date"
                    class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" name="end_date" id="end_date"
                    class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Créer le stage</button>
        </form>
    </div>
@endsection
