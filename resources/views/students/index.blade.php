@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Gestion des stagiaires</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm"
                            title="Ajouter un nouveau stagiaire">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($message = session('flash_message'))
                                        <script type="text/javascript">
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            })

                                            Toast.fire({
                                                icon: 'success',
                                                title: '{{ $message }}'
                                            })
                                        </script>
                                    @endif
                                    @foreach ($students as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>
                                                <a href="{{ url('/students/' . $item->id) }}" title="Voir le stagiaire">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Afficher
                                                    </button>
                                                </a>
                                                <a href="{{ url('/students/' . $item->id) . '/edit' }}"
                                                    title="Modifier le stagiaire">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ route('students.destroy', $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Supprimer le stagiaire" onclick="confirmDelete(event)">

                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                                                    </button>
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
                            {{ $students->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
