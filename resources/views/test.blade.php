<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="table-responsive">
                <form method="post" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="user_table">
                        <thead>
                            <tr>
                                <th width="35%">Product ID</th>
                                <th width="35%">Quantity</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td>
                                    @csrf
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            html = '<tr>';
            html += '<td><input type="number" name="product_id[]" class="form-control"></td>';
            html += '<td><input type="text" name="quantity[]" class="form-control"></td>';
            
            if(number > 1) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function() {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function() {
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route("dynamic-field.insert") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#save').attr('disabled', false);
                },
                success: function(data) {
                    if(data.error) {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    } else {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });
    });
</script>


<!-- fetch products from db where id="hidden id"
for each product, attach id and quantityMultiplier to meal
save meal to database
multiply nutritional value by quantityMultiplier in Meal>products method -->