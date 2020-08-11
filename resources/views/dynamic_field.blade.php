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
                                <th width="35%">Energy</th>
                                <th width="35%">Quantity</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td width="35%">
                                    <input type="number" id="energy" name="energy" class="form-control" value="5">
                                </td>
                                <td width="35%">
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="100">
                                </td>
                                <td width="30%">
                                    Action
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
    $(".incre").on("click", function() {
        var quantity = $(this).parent().find("#quantity");
        
        var i=+ quantity.val();
        i +=1;
        quantity.val(i);
        var energy = $(this).parent().parent().find("#energy").text();
        var result = energy.replace(' TL','');
        var total = result * i;
        $(this).parent().parent().find("#total").html(total).show();
    });
</script>