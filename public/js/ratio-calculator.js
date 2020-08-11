$(document).ready(function(){
    var energyPerStoredQuantity = $("#energy").val();
    var proteinPerStoredQuantity = $("#protein").val();
    var fatPerStoredQuantity = $("#fat").val();
    var carbsPerStoredQuantity = $("#carbs").val();
    var storedQuantity = $("#quantity").val();
    
    
    $("#quantity").change(function(){
                
        $("#energy").val(
            energyPerStoredQuantity / storedQuantity * $("#quantity").val()
        );
        $("#protein").val(
            proteinPerStoredQuantity / storedQuantity * $("#quantity").val()
        );
        $("#fat").val(
            fatPerStoredQuantity / storedQuantity * $("#quantity").val()
        );
        $("#carbs").val(
            carbsPerStoredQuantity / storedQuantity * $("#quantity").val()
        );
        
        $("#energy").val(Math.round($("#energy").val()));
        $("#protein").val(Math.round($("#protein").val()));
        $("#fat").val(Math.round($("#fat").val()));
        $("#carbs").val(Math.round($("#carbs").val()));
    });
});