@include('layouts.partial.architect_header')
    <header class="main-header">
        @include('layouts.partial.architect_top_nav')
    </header>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <div class="container-fluid">
                    @if (isset($errors))
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
@include('layouts.partial.architect_footer')
