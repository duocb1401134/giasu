$(document).ready(function () {
    $(".lop").change(function () {
        var id2 = $(".lop").val();
		//alert(id2);
        $.post("Php/data_mon.php", {id2: id2}, function (data) {
            $(".mon").html(data);
        });
    });
});