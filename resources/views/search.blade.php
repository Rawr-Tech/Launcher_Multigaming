@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa-home"></i>Home</a>
        </li>
        <li @if ($search_for == "none") class="active" @endif>
            <a href="/search">Search</a>
        </li>
        @if ($search_for != "none")
            <li class="active">
                @if ($search_for == "user")
                    <strong>Users</strong>

                @endif
            </li>
        @endif
    </ol>

    @if($search_for == "user")
        <h2>List of all users</h2>
    @endif

    <br/>

    <table class="table table-bordered datatable" id="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </tfoot>
    </table>

    @push('css')
    <!-- Datatables -->
    <link rel="stylesheet" href="/assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">
    @endpush

    @push('scripts')
    <!-- Datatables -->
    <script src="/assets/js/jquery.dataTables.js"></script>
    <script src="/assets/js/datatables/datatables.js"></script>
    <script src="/assets/js/select2/select2.min.js"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#users-table').DataTable({
                aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                bStateSave: true,
                processing: true,
                serverSide: true,
                ajax: {
                    dataType: 'json',
                    method: 'POST'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'username', name: 'username'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'}
                ]
            });
        });
    </script>
    @endpush
@endsection