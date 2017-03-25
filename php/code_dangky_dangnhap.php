<?php
// Đăng ký tài khoảng gia sư
 function dangkytaikhoan($email,$pass,$pass_again) {
	if($email != NULL){
		if(($pass!=NULL)&&($pass_again!=NULL)){
		$qr = "SELECT * FROM giasu WHERE EMAIL_GS ='$email'";
		$query = mysql_query($qr);
		if($query == NULL)
			$num = 0;
		else
			$num = mysql_num_rows($query);
		if($num == 0)
		{
			if($pass != $pass_again)
			{
				echo "Mật khẩu nhập lại không đúng!";
			}
			else
			{
                                 $qr = "INSERT INTO `giasu`(`ID_GS`, `ID_IMG`, `EMAIL_GS`, `MATKHAU_GS`,`DUYET_GS`, `TG_DK`, `ADMIN`, `DAXEM_GS`) VALUES (null,1,'$email','$pass_again',0,now(),0,0)" ;
                                //$qr = "INSERT INTO `giasu`(`ID_GS`, `ID_IMG`, `ID_TRINHDO`, `ID_KHOINGANH`, `TEN_GS`, `GIOITINH_GS`, `NGAYSINH_GS`, `SDT_GS`, `EMAIL_GS`, `MATKHAU_GS`, `GIOITHIEU_GS`, `NOICONGTAC_GS`, `DUYET_GS`, `LUONGKHOIDIEM_GS`, `LUONGCAONHAT_GS`, `CHUYENNGANH_GS`,`TG_DK`) VALUES (null,1,null,null,null,null,null,null,'$email','$pass_again',null,null,null,null,null,now())";
				mysql_query($qr);
				$_SESSION["EMAIL_GS"] = $email;
				$_SESSION["MATKHAU_GS"] = $pass_again;
				$qr ="SELECT * FROM giasu WHERE EMAIL_GS = '$email' AND MATKHAU_GS = '$pass_again'";
				$query  = mysql_query($qr);
				$row_giasu = mysql_fetch_array($query);
				$_SESSION["ID_GS"] = $row_giasu['ID_GS'];
			}
		}
		else
		{
			echo "Tài khoản này đã tồn tại!";
		}
	}
		else echo "Bạn không thể để trống trường mật khẩu và nhập lại mật khẩu"; 
}
	else echo "Bạn chưa nhập email";
}
// Kiểm tra đăng nhập
function kiemtradangnhap($email,$pass) {
	if($pass != NULL){
    $qr = " SELECT * FROM giasu WHERE EMAIL_GS='$email' AND MATKHAU_GS='$pass'";
    $user = mysql_query($qr);
    if (mysql_num_rows($user) == 1) {
        $row = mysql_fetch_array($user);
        $_SESSION["EMAIL_GS"] = $row['EMAIL_GS'];
        $_SESSION["TEN_GS"] = $row['TEN_GS'];
        $_SESSION["MATKHAU_GS"] = $row['MATKHAU_GS'];
        $_SESSION["ID_IMG"] = $row['ID_IMG'];
		$_SESSION["ID_GS"] = $row['ID_GS'];
    }
	else echo "Sai mật khẩu hoặc email không đúng!";
	}
	else echo "Bạn chưa nhập mật khẩu!";
}
// Lưu mật khẩu
function luumatkhau($email, $pass){
	if(($email != NULL)&&($pass != NULL)){
		if(isset($_POST["remember"])){
			setcookie("email",$email,time() + 3600);
			setcookie("password",$pass,time() + 3600);
			//$txtPw = md5($txtPw);
			$qr = " SELECT * FROM giasu WHERE EMAIL_GS='$email' AND MATKHAU_GS='$pass'";
			$user = mysql_query($qr);
			if (mysql_num_rows($user) == 1) {
				$row = mysql_fetch_array($user);
				setcookie("ID_GS",$row['ID_GS'],time() + 3600);
			}
	}
	}
}
?>
