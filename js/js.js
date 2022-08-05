$( document ).ready(function() {

    // Toggle dropdown menu.
    $('.bars-icon').click(function(){
        $(".dropdown-menu").slideToggle( "slow" );
        if($('.bars-icon').is(":visible"))
            $('.bars-icon').hide();
            $('.close-icon').show(); 
    });
    $('.close-icon').click(function(){
        $(".dropdown-menu").slideToggle( "slow" );
        if($('.close-icon').is(":visible"))
            $('.close-icon').hide();
            $('.bars-icon').show();
    });
});