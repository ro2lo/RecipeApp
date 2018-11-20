@section('searchBarShow')


    <div id="morphsearch" class="morphsearch">
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
<div class="clearfix"></div>
@endsection