$(document).ready(function () {
    $(".lop").change(function () {
        var id2 = $(".lop").val();
        $.post("../Php/data_mon_dkmonday.php", {id2: id2}, function (data) {
            $(".mon").html(data);
        });
    });
});