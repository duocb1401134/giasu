$(document).ready(function () {
    $(".lop").change(function () {
        var id2 = $(".lop").val();
		alert(id2);
        $.post("admin/php/mon-admin.php", {id2: id2}, function (data) {
            $(".mon").html(data);
        });
    });
});