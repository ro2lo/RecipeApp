@section('postJquery')
    @parent
    {{--<script>--}}

    $('.navbar-haut').css('display','none');

    $('#fullpage').fullpage({
//Navigation
menu: '#myMenu',
lockAnchors: false,
anchors:['auto','firstPage', 'secondPage','thirdPage','fourthPage','fivePage','sixPage','sevenPage'],
navigation: true,
navigationPosition: 'right',
navigationTooltips: ['firstSlide', 'secondSlide'],
showActiveTooltip: true,
slidesNavigation: true,
slidesNavPosition: 'bottom',

//Scrolling
css3: true,
scrollingSpeed: 700,
autoScrolling: true,
fitToSection: false,
fitToSectionDelay: 1000,
scrollBar: true,
easing: 'easeInOutCubic',
easingcss3: 'ease',
loopBottom: false,
loopTop: false,
loopHorizontal: true,
continuousVertical: true,
continuousHorizontal: true,
scrollHorizontally: true,
interlockedSlides: true,
dragAndMove: true,
offsetSections: false,
resetSliders: false,
fadingEffect: true,
normalScrollElements: 'panel-body, .element2',
scrollOverflow: false,
scrollOverflowReset: false,
scrollOverflowOptions: null,
touchSensitivity: 15,
normalScrollElementTouchThreshold: 5,
bigSectionsDestination: null,

//Accessibility
keyboardScrolling: true,
animateAnchor: true,
recordHistory: true,

//Design
controlArrows: true,
verticalCentered: false,
sectionsColor : ['#f8f9fa','#f8f9fa', '#f8f9fa','#f8f9fa', '#f8f9fa','#f8f9fa', '#f8f9fa','#f8f9fa'],
paddingTop: '0',
paddingBottom: '10px',
fixedElements: '.footer',
responsiveWidth: 0,
responsiveHeight: 0,
responsiveSlides: true,
parallax: true,
parallaxOptions: {type: 'reveal', percentage: 62, property: 'translate'},

//Custom selectors
sectionSelector: '.section',
slideSelector: '.slide',

lazyLoading: true,

//events
})

    var trigger = $('.hamburger'),
    overlay = $('.overlay'),
    isClosed = false;

    trigger.click(function () {
    hamburger_cross();
    });

    function hamburger_cross() {

    if (isClosed == true) {
    overlay.hide();
    trigger.removeClass('is-open');
    trigger.addClass('is-closed');
    isClosed = false;
    } else {
    overlay.show();
    trigger.removeClass('is-closed');
    trigger.addClass('is-open');
    isClosed = true;
    }
    }

    $('[data-toggle="offcanvas"]').click(function () {
    $('#wrapper').toggleClass('toggled');
    });


@endsection