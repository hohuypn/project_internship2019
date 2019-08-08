function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").change(function () {
    readURL(this);
});
function show_order_product(order_id){
    $.post('index.php?controller=order&action=getorderdetail&page=admin',{order_id:order_id},function(data) {
        $('#show_order_product div.modal-body').empty().html(data);
    })
}