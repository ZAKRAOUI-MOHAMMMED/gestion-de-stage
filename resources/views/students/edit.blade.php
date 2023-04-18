@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Page</div>
        <div class="card-body">
            <form action="{{ url('student/' . $students->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" required name="id" id="id" value="{{ $students->id }}" />
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"required name="name" id="name" value="{{ $students->name }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text"required name="address" id="address" value="{{ $students->address }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text"required name="mobile" id="mobile" value="{{ $students->mobile }}"
                        class="form-control">
                </div><br>
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger text-white"
                    onclick="window.location.href='{{ url('student') }}'">Annuler</button>

            </form>
        </div>
    </div>
@endsection
