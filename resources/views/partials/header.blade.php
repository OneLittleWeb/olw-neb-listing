<header class="header-area">
    <div class="header-menu-wrapper padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="/"><img src="{{asset('/images/nebraskalisting-logo.png')}}" alt="logo"></a>
                            <div class="d-flex align-items-center">
                                <a href="#"
                                   class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0"
                                   data-toggle="tooltip" data-placement="left" title="Add Listing">
                                    <i class="la la-plus"></i>
                                </a>
                                <div class="menu-toggle">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div><!-- end menu-toggle -->
                            </div>
                        </div><!-- end logo -->

                        @if(Route::currentRouteName() != 'home')
                            <div class="quick-search-form d-flex align-items-center">
                                <form action="#" class="w-100">
                                    <div class="header-search position-relative">
                                        <i class="la la-search form-icon"></i>
                                        <input type="search" name="looking_for"
                                               id="looking_for" placeholder="What are you looking for?"
                                               autocomplete="off">
                                        {{--                                        <div class="instant-results">--}}
                                        {{--                                            <ul class="instant-results-list">--}}
                                        {{--                                                <li><a href="#" class="d-flex align-items-center">Dog Grooming</a></li>--}}
                                        {{--                                                <li><a href="#" class="d-flex align-items-center">Restaurants</a></li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </form>
                            </div><!-- end quick-search-form -->
                        @endif

                        <div class="main-menu-content ml-auto">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="/">home</a>
                                    </li>
                                    <li>
                                        <a href="#">listings</a>
                                    </li>
                                    <li>
                                        <a href="#">pages</a>
                                    </li>
                                    <li>
                                        <a href="#">blog</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-right-content">
                            <a href="#" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-plus mr-2"></i>Add Listing
                            </a>
                        </div><!-- end nav-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>

@section('js')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete.search') }}";

        $('#looking_for').typeahead({
            source: function (query, process) {
                return $.get(path, {term: query}, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
