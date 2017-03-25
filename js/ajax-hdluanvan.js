$(document).ready(function () {
    $(".lop").change(function () {
        var id2 = $(".lop").val();
        $.post("../Php/code_luanvan.php", {id2: id2}, function (data) {
            $(".luanvan").html(data);
        });
    });
});