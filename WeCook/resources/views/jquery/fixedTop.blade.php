@section('postJquery')
    @parent
    {{--<script>--}}
$(window).scroll(function(){

if ($(this).scrollTop() > 60) {
$('.navbar-default').addClass('menu-link navbar-fixed-top');
$('.nav-header').addClass('navbar-header');
} else {
$('.nav-header').removeClass('navbar-header');
$('.navbar-default').removeClass('menu-link navbar-fixed-top');
}
});
@endsection