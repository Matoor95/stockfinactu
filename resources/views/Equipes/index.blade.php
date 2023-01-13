@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('equipes.create') }}" class="btn btn-success float-right">Ajouter une
                           une equipe</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Pays</th>
                                    <th scope="col">Date de creation</th>
                                    <th scope="col">Nombre d'employee</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipes as $equipe)
                                    <tr>
                                        <td>{{ $equipe->id }}</td>
                                        <td>{{ $equipe->location }}</td>
                                        <td>{{ $equipe->created_at->format('d/m/y:h:i:s') }}</td>
                                        <td>{{ $equipe->users->count() }}</td>
                                        <td>
                                            <div class="row align-item ">



                                                <div class="p-2"> <a
                                                        href="{{ route('equipes.edit', $equipe->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                </div>


                                                <div class="p-2">
                                                    <a href="">
                                                        <form action="{{ route('equipes.destroy', $equipe->id) }}"
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
