@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Page des étudiants</div>
        <div class="card-body">
            <h5 class="card-title">Nom: {{ $students->name }}</h5>
            <p class="card-text">Adresse: {{ $students->address }}</p>
            <p class="card-text">Mobile: {{ $students->mobile }}</p>
            <button type="button" class="btn btn-danger text-white"
                onclick="window.location.href='{{ url('students') }}'">Annuler</button>

        </div>
    </div>
@endsection
