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

    <div class="member-entry">

        <a href="/" class="member-img">
            <img src="/assets/images/member-1.jpg" class="img-rounded" />
            <i class="entypo-forward"></i>
        </a>

        <div class="member-details">
            <h4>
                <a href="extra-timeline.html">Leonora Murtha</a>
            </h4>

            <!-- Details with Icons -->
            <div class="row info-list">

                <div class="col-sm-4">
                    <i class="entypo-briefcase"></i>
                    Surgeons at <a href="#">Tons O' Toys</a>
                </div>

                <div class="col-sm-4">
                    <i class="entypo-twitter"></i>
                    <a href="#">@foromed</a>
                </div>

                <div class="col-sm-4">
                    <i class="entypo-facebook"></i>
                    <a href="#">fb.me/LeonoraAMurtha</a>
                </div>

                <div class="clear"></div>

                <div class="col-sm-4">
                    <i class="entypo-location"></i>
                    <a href="#">Manila</a>
                </div>

                <div class="col-sm-4">
                    <i class="entypo-mail"></i>
                    <a href="#">LeonoraAMurtha@dayrep.com</a>
                </div>

                <div class="col-sm-4">
                    <i class="entypo-linkedin"></i>
                    <a href="#">LeonoraAMurtha</a>
                </div>

            </div>
        </div>

    </div>

    @push('css')
    <!--
    <link rel="stylesheet" href="/assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">Datatables -->
    @endpush

    @push('scripts')
    <!--
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
    </script>Datatables -->
    @endpush
@endsection