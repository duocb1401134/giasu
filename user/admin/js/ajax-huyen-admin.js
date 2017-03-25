$(document).ready(function () {
    $(".tinh").change(function () {
        var id = $(".tinh").val();
		//alert(id);
        $.post("admin/php/huyen-admin.php", {id: id}, function (data) {
            $(".huyen").html(data);
        });
    });
});