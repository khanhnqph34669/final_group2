<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

<div class="container-form center">
	<div class="row">
		<div class="col-md-12">
			<h1 class="white">Đăng ký làm tác giả</h1>
			<p class="white">Bạn muốn chia sẻ thông tin , muốn trở thành nhà sáng tạo content, hãy liên hệ với chúng tôi theo form sau.</p>
		</div>
	</div>
	
	<form name="upload" method="post" action="/client/authorRequest" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center">
				<div class="btn-container">
					<!--the three icons: default, ok file (img), error file (not an img)-->
					<h1 class="imgupload"><i class="fa-solid fa-file"></i></h1>
					<h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
					<h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
					
					<p id="namefile">Gửi hồ sơ của bạn cho chúng tôi</p>
					<!--our custom btn which which stays under the actual one-->
					<button type="button" id="btnup" class="btn btn-primary btn-lg">Bấm vào đây để chọn file!</button>
					<!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
					<input type="file" value="" name="fileup" id="fileup">
					<input type="text" hidden value="<?= $users['Id']?>">
					<input type="text" hidden value="<?= $users['Name']?>">
					<input type="text" hidden value="<?= $users['Status']?>">
					<input type="text" hidden value="<?= $users['Email']?>">
					<input type="text" hidden value="<?= $users['Phone']?>">
					<input type="text" hidden value="<?= $users['Password']?>">
					<input type="text" hidden value="<?= $users['Address']?>">
					<input type="text" hidden value="<?= $users['roles_id']?>">
				</div>
			</div>
		</div>
			<!--additional fields-->
		<div class="row">			
			<div class="col-md-12">
				<!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
				<input type="submit" value="Submit!" class="btn btn-primary" id="submitbtn">
				<button type="submit" class="btn btn-default"  id="fakebtn" name="btn-submit">Submit! <i class="fa fa-minus-circle"></i></button>
			</div>
		</div>
	</form>
</div>


<a href="http://www.emilianocostanzo.com" target="_blank" id="sign">EMI</a>
<!-- <script>
    $('#fileup').change(function(){
//here we take the file extension and set an array of valid extensions
    var res=$('#fileup').val();
    var arr = res.split("\\");
    var filename=arr.slice(-1)[0];
    filextension=filename.split(".");
    filext="."+filextension.slice(-1)[0];
    valid=[".txt"];
//if file is not valid we show the error icon, the red alert, and hide the submit button
    if (valid.indexOf(filext.toLowerCase())==-1){
        $( ".imgupload" ).hide("slow");
        $( ".imgupload.ok" ).hide("slow");
        $( ".imgupload.stop" ).show("slow");
      
        $('#namefile').css({"color":"red","font-weight":700});
        $('#namefile').html("File "+filename+" is not  pic!");
        
        $( "#submitbtn" ).hide();
        $( "#fakebtn" ).show();
    }else{
        //if file is valid we show the green alert and show the valid submit
        $( ".imgupload" ).hide("slow");
        $( ".imgupload.stop" ).hide("slow");
        $( ".imgupload.ok" ).show("slow");
      
        $('#namefile').css({"color":"green","font-weight":700});
        $('#namefile').html(filename);
      
        $( "#submitbtn" ).show();
        $( "#fakebtn" ).hide();
    }
});
</script> -->

<style>
    /*just bg and body style*/
.container-form{
background-color:#1E2832;
padding-bottom:20px;
margin-top:10px;
border-radius:5px;
}
.row{
   justify-content: center;
}
.center{
text-align:center;  
}
#top{
margin-top:20px;  
}
.btn-container{
background:#fff;
border-radius:5px;
padding-bottom:20px;
margin-bottom:20px;
}
.white{
color:white;
}
.imgupload{
color:#1E2832;
padding-top:40px;
font-size:7em;
}
#namefile{
color:black;
}
h4>strong{
color:#ff3f3f
}
.btn-primary{
border-color: #ff3f3f !important;
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #ff3f3f !important;
border-color: #ff3f3f !important;
}

/*these two are set to not display at start*/
.imgupload.ok{
display:none;
color:green;
}
.imgupload.stop{
display:none;
color:red;
}


/*this sets the actual file input to overlay our button*/ 
#fileup{
opacity: 0;
-moz-opacity: 0;
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
width:200px;
cursor: pointer;
position:absolute;
left: 50%;
transform: translateX(-50%);
bottom: 40px;
height: 50px;
}

/*switch between input and not active input*/
#submitbtn{
  padding:5px 50px;
  display:none;
}
#fakebtn{
  padding:5px 40px;
}


/*www.emilianocostanzo.com*/
#sign{
	color:#1E2832;
	position:fixed;
	right:10px;
	bottom:10px;
	text-shadow:0px 0px 0px #1E2832;
	transition:all.3s;
}
#sign:hover{
	color:#1E2832;
	text-shadow:0px 0px 5px #1E2832;
}
</style>