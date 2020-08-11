<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th width="w-1/6">Name</th>
                <th width="w-1/6">Energy</th>
                <th width="w-1/6">Protein</th>
                <th width="w-1/6">Fat</th>
                <th width="w-1/6">Carbs</th>
                <th width="w-1/6">Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="text" id="name" name="name" value="{{ product.name }}">
                </td>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="energy" name="energy" value="{{ product.energy }}">
                </td>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="protein" name="protein" value="{{ product.protein }}">
                </td>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="fat" name="fat" value="{{ product.fat }}">
                </td>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="carbs" name="carbs" value="{{ product.carbs }}">
                </td>
                <td>
                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="quantity" value="100">
                </td>
            </tr>
        </tbody>
    </table>
</template>


<script>

    export default {
        name: 'intake-ratio-calculator',
        props(['product']),
        mounted() {
    
            var energyPerHundred = Math.round($("#energy").val());
            var proteinPerHundred = $("#protein").val();
            var fatPerHundred = $("#fat").val();
            var carbsPerHundred = $("#carbs").val();
            
            
            $(document).ready(function(){
                $("#quantity").change(function(){
                    $("#energy").val(
                        energyPerHundred * ($("#quantity").val() / 100)
                    );
                    $("#protein").val(
                        proteinPerHundred * ($("#quantity").val() / 100)
                    );
                    $("#fat").val(
                        fatPerHundred * ($("#quantity").val() / 100)
                    );
                    $("#carbs").val(
                        carbsPerHundred * ($("#quantity").val() / 100)
                    );
                    
                    $("#energy").val(Math.round($("#energy").val()));
                    $("#protein").val(Math.round($("#protein").val()));
                    $("#fat").val(Math.round($("#fat").val()));
                    $("#carbs").val(Math.round($("#carbs").val()));
                });
            });
        }
    }
</script>