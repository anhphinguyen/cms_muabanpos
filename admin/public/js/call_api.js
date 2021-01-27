// create product category
$('#form_category').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
        url: '?mod=product&controller=list_product_category&action=create',
        method: "post",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data) {
                console.log(data);
                if(data.success){
                    $('p.alert small').html(data.success).addClass('text-success');
                }
                if(data.error){
                    $('p.alert small').html(data.error.category_icon);
                }
            }
        }
    });
});