$(document).ready(function(){
	$(".city").change(function(){
		var id = $(".city").val();
		$.post("data_huyen.php", {id: id}, function(data){
			$(".tinh").html(data);
		});
	});
});