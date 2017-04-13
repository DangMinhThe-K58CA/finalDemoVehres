<nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       <h1><a class="navbar-brand" href="{{ route('home') }}">{{ trans('admin.nameApp') }}</a></h1>
    </div>

    <!-- Infomation -->
    <div class="drop-men">
        <ul class="nav_1">
            <!-- content notification -->
            @include('admins.layouts.notifications')
            <!-- info -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
                    <span class=" name-caret">{{ Auth::user()->name }}<i class="caret"></i></span><img class="img-circle" src="{{ Auth::user()->avatar }}" id="avatar">
                </a>
                <ul class="dropdown-menu " role="menu">
                    <li>
                        <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"><i class="fa fa-user"></i>{{ trans('layout.profile') }}</a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                {{ trans('layout.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
    <div class="clearfix"></div>
    <!-- left navbar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                {{--<li>--}}
                    {{--<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">{{ trans('admin.dashboard') }}</span></a>--}}
                {{--</li>--}}

                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">{{ trans('admin.manageGarages') }}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ action('Admin\GarageController@index', ['status' => config('common.garage.status.unactivated')]) }}" class=" hvr-bounce-to-right"> <i class="fa fa-star nav_icon"></i></i></i>Unactivated Garages</a>
                        </li>

                        <li>
                            <a href="{{ action('Admin\GarageController@index', ['status' => config('common.garage.status.activated')]) }}" class=" hvr-bounce-to-right"><i class="fa fa-check nav_icon"></i>{{ trans('admin.garagesActivated') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-book nav_icon"></i></i> <span class="nav-label">{{ trans('admin.manageArticles') }}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ action('Admin\ArticlesController@index', ['status' => config('common.article.status.unactivated')]) }}" class=" hvr-bounce-to-right"> <i class="fa fa-plus nav_icon"></i></i>Unactivated Articles</a>
                        </li>

                        <li>
                            <a href="{{ action('Admin\ArticlesController@index', ['status' => config('common.article.status.activated')]) }}" class=" hvr-bounce-to-right"><i class="fa fa-check nav_icon"></i>{{ trans('admin.articlesActivated') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ action('Admin\UserController@index') }}" class=" hvr-bounce-to-right">
                        <i class="fa fa-user nav_icon"></i> <span class="nav-label">{{ trans('admin.manageUsers') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
