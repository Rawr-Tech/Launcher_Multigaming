@extends('layouts.app')

@section('content')
    <div class="profile-env">
        <div class="modal fade" id="update-avatar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" role="form" id="form_avatar" enctype="multipart/form-data" action="/account/update/avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal Content is Responsive</h4>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Image Upload</label>

                                        <div class="col-sm-5">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                                    <img src="/upload/avatars/{{ $user->avatar }}" alt="Current user avatar">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="avatar" accept="image/*">
                                                </span>
                                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <header class="row">

            <div class="col-sm-2">

                <a href="javascript:" @if ($me) onclick="jQuery('#update-avatar').modal('show', {backdrop: 'static'});" @endif class="profile-picture">
                    <img src="/upload/avatars/{{ $user->avatar }}" class="img-responsive img-circle"/>
                </a>

            </div>

            <div class="col-sm-7">

                <ul class="profile-info-sections">
                    <li>
                        <div class="profile-name">
                            <strong>
                                <a href="#">{{ $user->username }}</a>
                                <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip"
                                   data-placement="top" data-original-title="Online"></a>
                                <!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->
                            </strong>
                            <span><a href="#">Co-Founder at Laborator</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>643</h3>
                            <span><a href="#">followers</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>108</h3>
                            <span><a href="#">following</a></span>
                        </div>
                    </li>
                </ul>

            </div>

            @if ($me == false)
                <div class="col-sm-3">

                    <div class="profile-buttons">
                        <a href="#" class="btn btn-default">
                            <i class="entypo-user-add"></i>
                            Follow
                        </a>

                        <a href="#" class="btn btn-default">
                            <i class="entypo-mail"></i>
                        </a>
                    </div>
                </div>
            @endif

        </header>

        <section class="profile-info-tabs">

            <div class="row">

                <div class="col-sm-offset-2 col-sm-10">

                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-location"></i>
                                Prishtina
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-suitcase"></i>
                                Works as <span>Laborator</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-calendar"></i>
                                16 October
                            </a>
                        </li>
                    </ul>


                    <!-- tabs for the profile links -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                        <li><a data-toggle="tab" href="#games">Games</a></li>
                        <li><a data-toggle="tab" href="#notifications">Notifications</a></li>
                        <li><a data-toggle="tab" href="#settings">Settings</a></li>
                    </ul>

                </div>

            </div>

        </section>


        <section class="profile-feed">

            <div class="tab-content">
                <div id="profile" class="tab-pane fade in active">
                    <h3>Profile</h3>
                    <p>Some content.</p>
                </div>
                <div id="games" class="tab-pane fade">
                    <h3>Games view</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="notifications" class="tab-pane fade">
                    <h3>Notications view</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="settings" class="tab-pane fade">
                    <h3>Settings View</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </section>
    </div>
@endsection