@section('postJquery')
    @parent
    {{--<script>--}}
    $( "div" ).click(function() {
      inp = $( this ).attr('data-check');
      input = $('#input'+inp);
        div= $('div#'+inp);
    var attr = $('#input'+inp).attr('checked');
    if(attr == 'checked' && div.hasClass('btn-success')){
        input.removeAttr('checked');
        div.removeClass('btn-success');
    }else {
        input.attr('checked',true);
        div.addClass('btn-success');
    }
    });
    {{--</script>--}}
@endsection