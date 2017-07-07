$(function() {

    // Sidebar Toggler
    function sidebarToggle(toogle) {
        var sidebar = $('#sidebar');
        var padder = $('.content-padder');
        if( toogle ) {
            $('.notyf').removeAttr( 'style' );
            sidebar.css({'display': 'block', 'x': -300});
            sidebar.transition({opacity: 1, x: 0}, 250, 'in-out', function(){
                sidebar.css('display', 'block');
            });
            if( $( window ).width() > 960 ) {
                padder.transition({marginLeft: sidebar.css('width')}, 250, 'in-out');
            }
        } else {
            $('.notyf').css({width: '90%', margin: '0 auto', display:'block', right: 0, left: 0});
            sidebar.css({'display': 'block', 'x': '0px'});
            sidebar.transition({x: -300, opacity: 0}, 250, 'in-out', function(){
                sidebar.css('display', 'none');
            });
            padder.transition({marginLeft: 0}, 250, 'in-out');
        }
    }

    $('#sidebar_toggle').click(function() {
        var sidebar = $('#sidebar');
        var padder = $('.content-padder');
        if( sidebar.css('x') == '-300px' || sidebar.css('display') == 'none' ) {
            sidebarToggle(true)
        } else {
            sidebarToggle(false)
        }
    });

    function resize()
    {
        var sidebar = $('#sidebar');
        var padder = $('.content-padder');
		padder.removeAttr( 'style' );
		if( $( window ).width() < 960 && sidebar.css('display') == 'block' ) {
			sidebarToggle(false);
		} else if( $( window ).width() > 960 && sidebar.css('display') == 'none' ) {
			sidebarToggle(true);
		}
    }

    if($( window ).width() < 960) {
        sidebarToggle(false);
    }

	$( window ).resize(function() {
		resize()
	});

    $('.content-padder').click(function() {
        if( $( window ).width() < 960 ) {
            sidebarToggle(false);
        }
    });

})
