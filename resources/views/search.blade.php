@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <ol class="breadcrumb bc-3">
            <li>
                <a href="/"><i class="fa-home"></i>Home</a>
            </li>
            <li class="active">
                <a href="/search">Search</a>
            </li>
        </ol>

        <br/>

        <section class="search-results-env">

            <div class="row">
                <div class="col-md-12">


                    <!-- Search categories tabs -->
                    <ul class="nav nav-tabs right-aligned hide">
                        <li class="tab-title pull-left">
                            <div class="search-string">10 results found for: <strong>“this”</strong></div>
                        </li>
                    </ul>

                    <!-- Search search form -->
                    <form id="search-form" class="search-bar">

                        <div class="input-group">
                            <input id="search-input" class="form-control input-lg" name="search"
                                   placeholder="Search for something..."
                                   type="text" @if (Request::has('search')) value="{{ Request::get('search') }}" @endif>

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-lg btn-primary btn-icon">
                                    Search
                                    <i class="entypo-search"></i>
                                </button>
                            </div>
                        </div>

                    </form>


                    <!-- Search search form -->


                </div>
            </div>

        </section>


        <div class="col-md-9 col-sm-12 col-lg-8" id="search-result">
            @for($i = 0; $i < 10; $i++)
                <div class="member-entry">

                    <a href="/" class="member-img">
                        <img src="/assets/images/member-1.jpg" class="img-rounded"/>
                        <i class="entypo-forward"></i>
                    </a>

                    <div class="member-details">
                        <h4>
                            <a href="/">Leonora Murtha</a>
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
            @endfor
        </div>

        <div class="col-md-3 col-sm-12 col-lg-4">

            <div class="member-entry">
                <div class="text-center">
                    <h4>Options avancées</h4>
                </div>
                <hr/>

                Rechercher par: DROPBOX

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
    <script>

        $(function () {
            var locked = false;

            function searchResult() {
                if (locked == true)
                    return (false);
                locked = true;
                $('#search-result').html('<div class="member-entry text-center"> <h2>Chargement...</h2> </div>');
                window.history.pushState(null, null, "/search?search=" + $("input#search-input").val());
                show_loading_bar(64);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/search',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        search: $("input#search-input").val()
                    },
                    error: function (response) {
                        locked = false;
                        console.log(response);
                        alert("Error intern, contact an administator !");
                    },
                    success: function (response) {
                        $('#search-result').html('');
                        show_loading_bar(100);
                        locked = false;
                        for (var i = 0; i < response.users_total; i++) {
                            $('#search-result').append('<div class="member-entry"> <a href="/user/' + response.users[i].id + '" class="member-img"> <img src="/upload/avatars/' + response.users[i].avatar + '" class="img-rounded"/> <i class="entypo-forward"></i> </a> <div class="member-details"> <h4> <a href="/user/' + response.users[i].id + '">' + response.users[i].username + '</a> </h4><!-- Details with Icons --> <div class="row info-list"> <div class="col-sm-4"> <i class="entypo-briefcase"></i>Surgeons at <a href="#">Tons O Toys</a> </div> <div class="col-sm-4"> <i class="entypo-twitter"></i> <a href="#">@foromed</a> </div> <div class="col-sm-4"> <i class="entypo-facebook"></i> <a href="#">fb.me/LeonoraAMurtha</a> </div> <div class="clear"></div> <div class="col-sm-4"> <i class="entypo-location"></i> <a href="#">Manila</a> </div> <div class="col-sm-4"> <i class="entypo-mail"></i> <a href="#">LeonoraAMurtha@dayrep.com</a> </div> <div class="col-sm-4"> <i class="entypo-linkedin"></i> <a href="#">LeonoraAMurtha</a> </div> </div> </div> </div>');
                        }

                        if (response.users_total == 0) {
                            $('#search-result').html('<div class="member-entry text-center"> <h2>No result found</h2> </div>');
                        }


                    }
                });
            }

            $('#search-form').on('submit', function () {
                searchResult();
                return (false);
            });

            if ($_GET('search'))
                searchResult();
        });
    </script>
    @endpush


@endsection