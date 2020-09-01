$(document).ready(function() {
    $(".toggler").click(function() {
        $(this).closest('tr').next('tr').toggle(450);
    });
});