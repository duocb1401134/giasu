$(document).ready(function () {
    $(".city").change(function () {
        var id = $(".city").val();
		//alert(id);
        $.post("lib/data_huyen.php", {id: id}, function (data) {
            $(".tinh").html(data);
        });
    });
});