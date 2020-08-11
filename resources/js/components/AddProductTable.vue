<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="border px-4 py-2">Product ID</th>
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
        name: 'add-product-table',
        mounted() {
            
            $('.addRow').on('click', function() {
                var id = $(this).attr("id");
                var name = $(this).attr("n");
                addRow(id, name);
            });
        
            function addRow(id, name) {
                var tr =    '<tr>' +
                                '<td class="border px-4 py-2">' +
                                    id +
                                    '<input type="hidden" name="id[]" id="">' +
                                '</td>' +
                                '<td class="border px-4 py-2">' +
                                    name +
                                '</td>' +
                                '<td class="border px-4 py-2">' +
                                    energy +
                                '</td>' +
                                '<td class="border px-4 py-2">' +
                                    '<input type="number" name="quantity[]">' +
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