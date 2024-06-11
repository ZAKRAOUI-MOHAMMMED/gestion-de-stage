@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Page</div>
        <div class="card-body">
            <form action="{{ url('students/' . $students->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" required name="id" id="id" value="{{ $students->id }}" />
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text"required name="name" id="name" value="{{ $students->name }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text"required name="address" id="address" value="{{ $students->address }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text"required name="mobile" id="mobile" value="{{ $students->mobile }}"
                        class="form-control">
                </div><br>
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <button type="button" class="btn btn-danger text-white"
                    onclick="window.location.href='{{ url('students') }}'">Annuler</button>

            </form>
        </div>
    </div>
@endsection
