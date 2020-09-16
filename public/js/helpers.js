jQuery(function(){
    $('.log-info').on("click", function() {
        $(this).closest('tr').next('tr').toggle(450);
    });
});