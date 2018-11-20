@section('AutoWrite')
    @parent
        {{--<script>--}}
    {{--//made by vipul mirajkar thevipulm.appspot.com--}}
    {{--var TxtType = function(el, toRotate, period) {--}}
    {{--this.toRotate = toRotate;--}}
    {{--this.el = el;--}}
    {{--this.loopNum = 0;--}}
    {{--this.period = parseInt(period, 10) || 2000;--}}
    {{--this.txt = '';--}}
    {{--this.tick();--}}
    {{--this.isDeleting = false;--}}
    {{--};--}}

    {{--TxtType.prototype.tick = function() {--}}
    {{--var i = this.loopNum % this.toRotate.length;--}}
    {{--var fullTxt = this.toRotate[i];--}}

    {{--if (this.isDeleting) {--}}
    {{--this.txt = fullTxt.substring(0, this.txt.length - 1);--}}
    {{--} else {--}}
    {{--this.txt = fullTxt.substring(0, this.txt.length + 1);--}}
    {{--}--}}

    {{--this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';--}}

    {{--var that = this;--}}
    {{--var delta = 200 - Math.random() * 100;--}}

    {{--if (this.isDeleting) { delta /= 2; }--}}

    {{--if (!this.isDeleting && this.txt === fullTxt) {--}}
    {{--delta = this.period;--}}
    {{--this.isDeleting = true;--}}
    {{--} else if (this.isDeleting && this.txt === '') {--}}
    {{--this.isDeleting = false;--}}
    {{--this.loopNum++;--}}
    {{--delta = 500;--}}
    {{--}--}}

    {{--setTimeout(function() {--}}
    {{--that.tick();--}}
    {{--}, delta);--}}
    {{--};--}}

    {{--window.onload = function() {--}}
    {{--var elements = document.getElementsByClassName('typewrite');--}}
    {{--for (var i=0; i < elements.length; i++) {--}}
    {{--var toRotate = elements[i].getAttribute('data-type');--}}
    {{--var period = elements[i].getAttribute('data-period');--}}
    {{--if (toRotate) {--}}
    {{--new TxtType(elements[i], JSON.parse(toRotate), period);--}}
    {{--}--}}
    {{--}--}}
    {{--// INJECT CSS--}}
    {{--var css = document.createElement("style");--}}
    {{--css.type = "text/css";--}}
    {{--css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";--}}
    {{--document.body.appendChild(css);--}}
    {{--};--}}
    {{--</script>--}}
    {{--<script>--}}
        (function() {
            var morphSearch = document.getElementById( 'morphsearch' ),
                    input = morphSearch.querySelector( 'input.morphsearch-input' ),
                    ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
                    isOpen = isAnimating = false,
                    // show/hide search area
                    toggleSearch = function(evt) {
                        // return if open and the input gets focused
                        if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;
                        if( isOpen ) {
                            classie.remove( morphSearch, 'open' );
                            // trick to hide input text once the search overlay closes
                            // todo: hardcoded times, should be done after transition ends
                            if( input.value !== '' ) {
                                setTimeout(function() {
                                    classie.add( morphSearch, 'hideInput' );
                                    setTimeout(function() {
                                        classie.remove( morphSearch, 'hideInput' );
                                        input.value = '';
                                    }, 300 );
                                }, 500);
                            }

                            input.blur();
                        }
                        else {
                            classie.add( morphSearch, 'open' );
                        }
                        isOpen = !isOpen;
                    };
            // events
            input.addEventListener( 'focus', toggleSearch );
            ctrlClose.addEventListener( 'click', toggleSearch );
            // esc key closes search overlay
            // keyboard navigation events
            document.addEventListener( 'keydown', function( ev ) {
                var keyCode = ev.keyCode || ev.which;
                if( keyCode === 27 && isOpen ) {
                    toggleSearch(ev);
                }
            } );
            /***** for demo purposes only: don't allow to submit the form *****/
            morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
        })();
    {{--</script>--}}
@endsection