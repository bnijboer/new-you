$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn-submit").click(function(e){
    e.preventDefault();

    var name = $("input[name=name]").val();

    $.ajax({
        type:'POST',
        url:'/ajaxRequest',
        data:{name:name},
        success:function(data){
            alert(data.name);
        }
    });
});