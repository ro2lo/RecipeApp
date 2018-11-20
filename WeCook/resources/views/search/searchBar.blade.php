@section('searchBar')
    <div id="" class="morphsearch">
        {!! Form::open(array(
        'url' => '/recettes/search' ,
        'method' => 'post',
        'class' => 'morphsearch-form'
        )) !!}
        <input class="morphsearch-input" type="text" name="title" id="searchRecettes" placeholder="Rechercher une recette, une entrée, un plat, un gateau..."/>
        {{ Form::submit('Search',['class'=>'morphsearch-submit']) }}
        {!! Form::close() !!}
        <div class="morphsearch-content">
            <div class="dummy-column">
                <h2>People</h2>
                <a class="dummy-media-object" href="http://twitter.com/SaraSoueidan">
                    <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
                    <h3>Sara Soueidan</h3>
                </a>
            </div>
            <div class="dummy-column">
                <h2>Popular</h2>
                <a class="dummy-media-object" href="http://tympanus.net/codrops/2014/08/05/page-preloading-effect/">
                    <img src="img/thumbs/PagePreloadingEffect.png" alt="PagePreloadingEffect"/>
                    <h3>Page Preloading Effect</h3>
                </a>
            </div>
            <div class="dummy-column">
                <h2>Recent</h2>
                <a class="dummy-media-object" href="http://tympanus.net/codrops/2014/10/07/tooltip-styles-inspiration/">
                    <img src="img/thumbs/TooltipStylesInspiration.png" alt="TooltipStylesInspiration"/>
                    <h3>Tooltip Styles Inspiration</h3>
                </a>
            </div>
        </div><!-- /morphsearch-content -->
        <span class="morphsearch-close"></span>
    </div><!-- /morphsearch -->

    <div class="backSearch">
        <div id="bootstrap-touch-slider" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="{{ asset('img/slider/first.jpeg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                               </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{ asset('img/slider/second.jpeg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                      </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{ asset('img/slider/third.jpeg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                         </div>
                </div>
                <!-- End of Slide -->


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

    </div>
    <div class="col-sm-12 social-bar text-center list-inline">
        <span class="list-inline">
           <li> <p>Retrouvez nous sur </p></li>
            <a href="" class="btn btn-default"><i class="fa fa-facebook"></i></a>
            <a href="" class="btn btn-default"><i class="fa fa-instagram"></i></a>
        </span>
    </div>
    <div class="clearfix"></div>
@endsection