
<div id="doimatkhau" class="forms-main">                     
    <h2 class="inner-tittle"><center>Đổi mật khẩu</center></h2>
    <div class="graph-form">
        <div class="validation-form">
            <form method="POST">
			<?php
				if(isset($_POST['submit'])){
						$matkhaumoi = $_POST['nhaplaimatkhaumoi'];
						doimatkhau($_SESSION["ID_GS"],$matkhaumoi);
						}
			?>
                <div class="vali-form">
                    <div class="col-md-12 form-group1">
                        <label class="control-label">Mật Khẩu Cũ</label>
                        <input name="matkhaucu" type="password" placeholder="Mật Khẩu Cũ" required="">
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Mật Khẩu Mới</label>
                    <input type="password" name="matkhaumoi" placeholder="Mật Khẩu Mới" required="">
                </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Nhập Lại Mật Khẩu Mới</label>
                    <input name="nhaplaimatkhaumoi" type="password" placeholder="Mật Khẩu Mới" required="">
                </div>
                <div class="clearfix"> </div>
				<input id="btnDangky" name="p" type="hidden" value="2">
                <div class="col-md-12 form-group button-2">
                    <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>

                </div>
                <div class="clearfix"> </div>

            </form>
        </div>
    </div>
</div>