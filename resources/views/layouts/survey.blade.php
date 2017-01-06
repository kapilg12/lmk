@include('layouts.partial.header')
    <header class="main-header">
        @include('layouts.partial.top_nav')
    </header>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
@include('layouts.partial.footer')
