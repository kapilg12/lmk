  <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bhujal Sanrakshan
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">  
                    @if (!Auth::guest())
                        @if (Auth::user()->can(['role-list','role-create','role-edit','role-delete','role-show']))
                            <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-sign-out"></i>Roles</a></li>
                        @endif
                        @if (Auth::user()->can(['user-list','user-create','user-edit','user-delete','user-show']))
                            <li><a href="{{ url('/users') }}"><i class="fa fa-btn fa-sign-out"></i>Users</a></li>
                        @endif    
                        @if (Auth::user()->can(['user-list','user-create','user-edit','user-delete','user-show']))
                            <li><a href="{{ url('/offices') }}"><i class="fa fa-btn fa-sign-out"></i>Regional Offices</a></li>
                        @endif
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    @endif    
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>                        
                    @else
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">                                
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
