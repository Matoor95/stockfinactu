@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right">Ajouter
                            un utilisateur</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom et Prenom</th>
                                    <th scope="col">Poste</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">telephone</th>
                                    <th scope="col">Date de venu</th>
                                    <th scope="col">Equipe</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->poste }}</td>
                                        <td><img src="{{ $user->image }}" alt=""></td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tel }}</td>
                                        <td>{{ $user->created_at->format('d/m/y:h:i:s') }}</td>
                                        <td>{{ $user->equipes->location }}</td>
                                        <td>
                                            <div class="row align-item ">



                                                <div class="p-2"> <a href="{{ route('equipes.edit', $user->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                </div>


                                                <div class="p-2">
                                                    <a href="">
                                                        <form action="{{ route('equipes.destroy', $user->id) }}"
                                                            method="POST">
                                                            <input name="_method" type="hidden" value="DELETE">


                                                            @csrf

                                                            @method('DELETE')
                                                            <button class="btn btn-danger show_confirm " title='Delete'
                                                                type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </a>
                                                </div>


                                            </div>


                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>


    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal.fire({
                    title: 'voulez vous supprimer ce client?',
                    text: '',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#00983A',
                    CancelButtonText: 'Annuler',
                    confirmButtonText: 'Oui, supprimez-le!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
        });

        $(function() {
            $("#example1").DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "tous"]
                ],
                order: [],
                info: true,
                responsive: true,
                autoWidth: false,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endpush
