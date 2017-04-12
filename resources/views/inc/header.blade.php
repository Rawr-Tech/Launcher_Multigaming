<!-- TMP ALERT SYSTEM -->

@if ($errors->has('alert'))
    @if ($errors->get('alert')['type'] == 'popup')
        <script>
            $(function() {
                sweetAlert("{{ $errors->get('alert')['title'] }}", "{{ $errors->get('alert')['message'] }}", "{{ $errors->get('alert')['style'] }}");
            });
        </script>
    @elseif ($errors->get('alert')['type'] == 'default')
        <div class="alert alert-danger">
            <ul>
                {{ $errors->get('alert')['type'] }}
                {{ $errors->get('alert')['message'] }}
            </ul>
        </div>
    @endif
@endif

<!-- END TMP ALERT SYSTEM -->



<div class="row">

    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-right-xs pull-none-xsm">

            <!-- Message Notifications -->
            <li class="notifications dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="entypo-search"></i>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <form class="top-dropdown-search" action="/search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search anything..." name="search">
                            </div>
                        </form>
                    </li>
                </ul>

            </li>

            <!-- Task Notifications -->
            <li class="notifications dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="entypo-list"></i>
                    <span class="badge badge-warning">1</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="top">
                        <p>You have 6 pending tasks</p>
                    </li>

                    <li>
                        <ul class="dropdown-menu-list scroller">
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">Procurement</span>
												<span class="percent">27%</span>
											</span>

                                    <span class="progress">
												<span style="width: 27%;" class="progress-bar progress-bar-success">
													<span class="sr-only">27% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">App Development</span>
												<span class="percent">83%</span>
											</span>

                                    <span class="progress progress-striped">
												<span style="width: 83%;" class="progress-bar progress-bar-danger">
													<span class="sr-only">83% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">HTML Slicing</span>
												<span class="percent">91%</span>
											</span>

                                    <span class="progress">
												<span style="width: 91%;" class="progress-bar progress-bar-success">
													<span class="sr-only">91% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">Database Repair</span>
												<span class="percent">12%</span>
											</span>

                                    <span class="progress progress-striped">
												<span style="width: 12%;" class="progress-bar progress-bar-warning">
													<span class="sr-only">12% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">Backup Create Progress</span>
												<span class="percent">54%</span>
											</span>

                                    <span class="progress progress-striped">
												<span style="width: 54%;" class="progress-bar progress-bar-info">
													<span class="sr-only">54% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
											<span class="task">
												<span class="desc">Upgrade Progress</span>
												<span class="percent">17%</span>
											</span>

                                    <span class="progress progress-striped">
												<span style="width: 17%;" class="progress-bar progress-bar-important">
													<span class="sr-only">17% Complete</span>
												</span>
											</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="external">
                        <a href="#">See all tasks</a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>


    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">

            <!-- Language Selector -->
            <li class="dropdown language-selector">

                Language: &nbsp;
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <img src="/assets/images/flags/flag-{{  Auth::user()->lang }}.png" width="16" height="16"/>
                </a>

                <ul class="dropdown-menu pull-right">
                    @foreach(config('custom.languages') as $key => $item)
                        <li class="{{ Auth::user()->lang == $key ? 'active' : '' }}">
                            <a href="/account/update/lang/{{ $key }}">
                                <img src="/assets/images/flags/flag-{{ $key }}.png" width="16" height="16"/>
                                <span>{{ $item['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            <li class="sep"></li>

            <li>
                <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                    <i class="entypo-chat"></i>
                    Chat

                    <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                </a>
            </li>

            <li class="sep"></li>

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="entypo-logout"></i>
                    Log Out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>

    </div>

</div>