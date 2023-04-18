@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Students Page</div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $students->name }}</h5>
            <p class="card-text">Address: {{ $students->address }}</p>
            <p class="card-text">Mobile: {{ $students->mobile }}</p>
            <button type="button" class="btn btn-danger text-white"
                onclick="window.location.href='{{ url('student') }}'">Annuler</button>

        </div>
    </div>
@endsection
