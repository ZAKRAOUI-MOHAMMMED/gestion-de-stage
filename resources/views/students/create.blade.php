@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Stagiaire Page</div>
        <div class="card-body">
            <form action="{{ url('student') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"required name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" required name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" required name="mobile" id="mobile" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger text-white"
                    onclick="window.location.href='{{ url('student') }}'">Annuler</button>
            </form>
        </div>
    </div>
@endsection
