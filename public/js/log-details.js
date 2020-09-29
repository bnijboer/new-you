jQuery(function()
{
    $(".details-button").on("click", function() {
        $(this).parents().next(".log-details").slideToggle();
    });
});