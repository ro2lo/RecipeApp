@section('postJquery')
    @parent
    {{--<script>--}}
    $('[id=add]').on('click',function(){
        nbBase =  parseFloat($('#nbPers').attr('value'));
        nbBase = nbBase + 1;
        parseFloat($('#nbPers').attr('value',nbBase))
        calcul(parseFloat(nbBase));
    });

    $('[id=takeOff]').on('click',function(i){
    nbBase =  parseFloat($('#nbPers').attr('value'));
    if(nbBase > 1){
    nbBase = nbBase - 1;
    parseFloat($('#nbPers').attr('value',nbBase))
    calcul(parseFloat(nbBase));
    }
    });

    function calcul(nbBase) {
    $("[id=aliment]").each(function(i) {
    $(this).attr('value', Math.round(parseFloat($(this).attr('about')* nbBase)));
    });
     }
    {{--</script>--}}
@endsection