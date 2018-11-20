@section('postJquery')
    @parent
    {{--<script>--}}


    // on initialise ajaxready à true au premier chargement de la fonction
    $(window).data('ajaxready', true);
    if($('.dont') > 0){
    $('div.active').append('<div id="loader" class="text-center col-md-12" style=""><p><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>Loading...</p></div>');
    }

    var deviceAgent = navigator.userAgent.toLowerCase();
    var agentID = deviceAgent.match(/(Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini)/);

    $(window).scroll(function() {

    // On teste si ajaxready vaut false, auquel cas on stoppe la fonction
    if ($(window).data('ajaxready') == false) return;
    if(($(window).scrollTop() + $(window).height())+ 50 > $(document).height()
    || agentID && ($(window).scrollTop() + $(window).height()) + 150 > $(document).height()) {


    // lorsqu'on commence un traitement, on met ajaxready à false
    $(window).data('ajaxready', false);

    $('div.active #loader').css('opacity',1);


    for(i=0;i < 1;i++){
        source =  $($('.active .dont iframe')[i]).attr('data-iframe')


    $($('div.active .dont')[i]).addClass('do');

    $($('.active .dont iframe')[i]).src = source;
    $($('.active .dont iframe')[i]).attr('src',source)
    $($('div.active .dont')[i]).removeClass('dont');
    }

    $(window).data('ajaxready', true);

    $('div.active #loader').css('opacity',0);
    }
    })


    $(window).scroll(function(){
    $(".active .do iframe").withinviewport().each(function() {

    if ($(window).data('ajaxpret') == false) return;

    $(window).data('ajaxpret', false);

    a = $($(this)[0]).attr('data-play');

    if(a == 'true'){
    if (($($(this)[0]).offset().top) < $(window).scrollTop()+45){
    $($(this)[0]).attr('data-play', 'none');
    source = $($(this)[0]).attr('data-iframe');
    $(this)[0].src = '';
    $(this)[0].src = source;
    }
    }

    if(a == 'false'){

    if (($(window).scrollTop()+200) >  $($(this)[0]).offset().top){
    console.log('izi');
    $($(this)[0]).attr('data-play', 'true');
    $(this)[0].src += "&autoplay=1";
    }

    }

    $(window).data('ajaxpret', true);

    })
    })


    $( document ).ready(function() {
    $('.progress').fadeOut('slow');
    });


@endsection