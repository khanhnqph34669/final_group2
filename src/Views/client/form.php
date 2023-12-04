<h1 class="reg-author">Đăng ký làm tác giả</h1>
<div class="container-form">
	<form action="/client/authorRequest" method="post" enctype="multipart/form-data">
		<input type="file" name="PathPortFolio" class="input-file">
		<input type="hidden" name="Id" value='<?=$users['Id']?>'>
		<input type="hidden" name="Name" value='<?=$users['Name']?>'>
		<input type="hidden" name="Email" value='<?=$users['Email']?>'>
		<input type="hidden" name="Phone" value='<?=$users['Phone']?>'>
		<input type="hidden" name="Password" value='<?=$users['Password']?>'>
		<input type="hidden" name="Address" value='<?=$users['Address']?>'>
		<input type="hidden" name="roles_id" value='<?=$users['roles_id']?>'>
		<div class="checkbox">
			<input type="checkbox" name="" id=""><span>Chấp nhận điều khoản</span>
		</div>
		<button type="submit" name="btn-submit">Gửi</button>
	</form>
	<?php 
		if(isset($err)){
			echo $err;
		}
	?>
</div>

<style>

	.reg-author {
		text-align: center;
	}
	.container-form {
		width: 100%;
		height: 40vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	form {
		width: 50%;
		display: flex;
		flex-direction: column;
		justify-content: space-around;
		align-items: center;
	}

	.input-file {
		cursor: pointer;
		display: inline-flex;
		align-items: center;
		border-radius: 4px;
		font-size: 14px;
		font-weight: 600;
		color: #fff;
		font-size: 14px;
		padding: 10px 12px;
		background-color: #4245a8;
		box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
	}
</style>