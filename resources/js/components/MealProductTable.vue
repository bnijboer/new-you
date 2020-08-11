<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="border px-4 py-2">Product Name</th>
                <th class="border px-4 py-2">Energy</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: 'meal-product-table',
        props: ['product'],
        mounted() {
            
            $(document).ready(function () {
                $('.test').on('change', function(){
                    alert('hoi');
                    var energyPerQuantity = $("#energy").val(
                        energyPerHundred * ($("#quantity").val() / 100)
                    );
                    kut();
                });
                
                function kut(){
                    alert('kut');
                }
                
            });
            
            
            
            
            $('.addRow').on('click', function() {
                var name = $(this).attr("n");
                var energyPerHundred = $(this).attr("energy");
                addRow(name, energyPerHundred);
            });
        
            function addRow(name, energyPerHundred) {
                var tr =    '<tr>' +
                                '<td class="border px-4 py-2">' +
                                    name +
                                '</td>' +
                                '<td class="border px-4 py-2">' +
                                    '<span id="energy">' + energyPerHundred + '</span>' +
                                '</td>' +
                                '<td class="border px-4 py-2">' +
                                    '<input id="quantity" class="test" type="number" name="quantity[]" value="100">' +
                                '</td>' +
                                '<td class="border px-4 py-2" style="text-align: center">' +
                                    '<a href="#" class="remove">-</a>' +
                                '</td>' +
                            '</tr>';
                $('tbody').append(tr);
            }
            
            $('tbody').on('click', '.remove', function() {
                $(this).parent().parent().remove();
            });
            

        }
    }
</script>