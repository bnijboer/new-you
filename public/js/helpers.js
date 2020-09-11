jQuery(function(){
    $('.log-info').click(function() {
        $(this).closest('tr').next('tr').toggle(450);
    });
    
    $('.product-info').click(function() {
        $(this).parents().children().next('testdiv').toggle(450);
    });
    
    $('#hamburger').click(function() {
        $('#hamburgerLinks').toggle();
    });
    
    var mouseInMenu = false;
    
    $('#hamburgerLinks').hover(function() { 
        mouseInMenu = true; 
    }, function() { 
        mouseInMenu = false; 
    });

    $('html').mouseup(function(){ 
        if(! mouseInMenu) $('#hamburgerLinks').hide();
    });
    
});