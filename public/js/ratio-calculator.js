jQuery(function()
{
    var energyPerStoredQuantity = $("#energy").val();
    var proteinPerStoredQuantity = $("#protein").val();
    var fatPerStoredQuantity = $("#fat").val();
    var carbsPerStoredQuantity = $("#carbs").val();
    var storedQuantity = $("#quantity").val();
    
    $("#quantity").on("change", function()
    {
        $("#energy").val(
            Math.round(
                energyPerStoredQuantity / storedQuantity * $("#quantity").val()
            )
        );
        $("#protein").val(
            Math.round(
                proteinPerStoredQuantity / storedQuantity * $("#quantity").val()
            )
        );
        $("#fat").val(
            Math.round(
                fatPerStoredQuantity / storedQuantity * $("#quantity").val()
            )
        );
        $("#carbs").val(
            Math.round(
                carbsPerStoredQuantity / storedQuantity * $("#quantity").val()
            )
        );
    });
});