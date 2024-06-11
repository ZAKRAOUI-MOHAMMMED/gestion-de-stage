@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stages</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Entreprise</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Note</th>
                    <th>Remarques</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stages as $stage)
                    <tr>
                        <td>{{ $stage->student->name }}</td>
                        <td>{{ $stage->company_name }}</td>
                        @if (is_object($stage->start_date))
                            <td>{{ $stage->start_date->format('Y-m-d') }}</td>
                        @else
                            <td>{{ $stage->start_date }}</td>
                        @endif

                        @if (is_object($stage->start_date))
                            <td>{{ $stage->end_date->format('Y-m-d') }}</td>
                        @else
                            <td>{{ $stage->end_date }}</td>
                        @endif
                        <td>{{ $stage->grade ?? 'N/A' }}</td>
                        <td>{{ $stage->notes ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('stages.destroy', $stage->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete(event)">Supprimer</button>
                                <script type="text/javascript">
                                    function confirmDelete(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: 'Êtes-vous sûr?',
                                            text: "Vous ne pourrez pas revenir en arrière!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Oui, supprimer!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                event.target.closest('form').submit();
                                            }
                                        })
                                    }
                                </script>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $stages->links('pagination::bootstrap-5') }}

        <a href="{{ route('stages.create') }}" class="btn btn-success">Créer un nouveau stage</a>
    </div>
@endsection
