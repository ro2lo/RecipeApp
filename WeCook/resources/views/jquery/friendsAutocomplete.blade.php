@section('postJquery')
    @parent
    {{--<script>--}}

    $('.users').hide();
    $('#searchFriends').keyup(function(){
    var txt = $(this).val();
    $('.users:not(:contains("'+txt+'"))').hide();
    $('.users:contains("'+txt+'")').show();
    });


    console.log(txt);
    console.log($('#searchFriends').val());

    {{--$.ajaxSetup({ cache: false });--}}
    {{--</script>--}}
@endsection