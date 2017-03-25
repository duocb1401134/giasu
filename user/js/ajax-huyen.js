$(document).ready(function () {
    $(".city").change(function () {
        var id = $(".city").val();
		//alert(id);
        $.post("../user/Php/data_huyen_dknoiday.php", {id: id}, function (data) {
            $(".huyen").html(data);
        });
    });
});