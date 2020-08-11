<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<body>



    <ul>
        @foreach ($products as $product)
            <li>
                <a href="#" id="{{ $product->id }}" n="{{ $product->name }}" class="addRow">{{ $product->name }}</a>
            </li>
        @endforeach
    </ul>
        
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th style="text-align: center"><a href="#" class="addRow">+</a></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
        $('.addRow').on('click', function() {
            var id = $(this).attr("id");
            var name = $(this).attr("n");
            addRow(id, name);
        });
        
        function addRow(id, name) {
            var tr =    '<tr>' +
                            '<td class="border px-4 py-2">' +
                                id +
                                '<input type="hidden" name="id[]">' +
                            '</td>' +
                            '<td class="border px-4 py-2">' +
                                name +
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
        
    </script>

</body>
</html>


<!-- fetch products from db where id="hidden id"
for each product, attach id and quantityMultiplier to meal
save meal to database
multiply nutritional value by quantityMultiplier in Meal>products method -->