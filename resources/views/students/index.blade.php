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
                        <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
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
                                                <a href="{{ url('/student/' . $item->id) }}" title="View Student">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Afficher
                                                    </button>
                                                </a>
                                                <a href="{{ url('/student/' . $item->id) . '/edit' }}" title="Edit Student">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('/student' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Student" onclick="confirmDelete()">

                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                                                    </button>
                                                    <script type="text/javascript">
                                                        function confirmDelete() {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: "You won't be able to revert this!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Yes, delete it!'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    Swal.fire(
                                                                        'Deleted!',
                                                                        'Your file has been deleted.',
                                                                        'success'
                                                                    )
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
