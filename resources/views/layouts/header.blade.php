<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    Administration
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @yield('page_active')
                    </ul>
                </div>
                <!-- @if(isset($showSearchForm) && $showSearchForm) -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search name" value="{{$search}}" aria-label="Search"
                    name="q">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- @endif -->
            </div>
        </nav>
    </div>
</div>