@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le stage</h1>

        <form action="{{ route('stages.update', $stage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_id">Étudiant</label>
                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
                    <option value="">Sélectionner un étudiant</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $stage->student_id ? 'selected' : '' }}>
                            {{ $student->name }}</option>
                    @endforeach
                </select>
                @error('student_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company_name">Nom de l'entreprise</label>
                <input type="text" name="company_name" id="company_name"
                    class="form-control @error('company_name') is-invalid @enderror" value="{{ $stage->company_name }}">
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" name="start_date" id="start_date"
                    class="form-control @error('start_date') is-invalid @enderror"
                    value="{{ is_object($stage->start_date) ? $stage->start_date->format('Y-m-d') : $stage->start_date }}">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" name="end_date" id="end_date"
                    class="form-control @error('end_date') is-invalid @enderror"
                    value="{{ is_object($stage->end_date) ? $stage->end_date->format('Y-m-d') : $stage->end_date }}">
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade">Note</label>
                <input type="number" name="grade" id="grade"
                    class="form-control @error('grade') is-invalid @enderror" value="{{ $stage->grade }}" step="0.01"
                    min="0" max="100">
                @error('grade')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="notes">Remarques</label>
                <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror">{{ $stage->notes }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le stage</button>
        </form>
    </div>
@endsection
