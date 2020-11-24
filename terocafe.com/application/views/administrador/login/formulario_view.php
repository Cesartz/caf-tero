<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Panel Administrador | Tero</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="https://use.fontawesome.com/cbb6644fdb.js"></script>

<script language="JavaScript">
$(function() {
							
	$("#enter_password").on("keyup",function(){
		if($(this).val()){
			$(".fa-eye").show();
		}
		else{
			$(".fa-eye").hide();
		}
		$("#enter_password").attr('type','password');
	});
	
	
	$(".fa-eye").mousedown(function(){
		$("#enter_password").attr('type','text');
	}).mouseup(function(){
		$("#enter_password").attr('type','password');
	}).mouseout(function(){
		$("#enter_password").attr('type','password');
	});
	
});
<!--
//  ------ check form ------
function checkData() {
		var f1 = document.forms[0];
		var wm = "Estimado visitante,\nindique los siguientes datos:\n\r\n";
		var noerror = 1;

		// --- entered_login ---
		var t1 = f1.enter_login;
		if (t1.value == "" || t1.value == " ") {
				wm += "Nombre\r\n";
				noerror = 0;
		}

		// --- entered_password ---
		var t1 = f1.enter_password;
		if (t1.value == "" || t1.value == " ") {
				wm += "Clave\r\n";
				noerror = 0;
		}

		// --- check if errors occurred ---
		if (noerror == 0) {
				alert(wm);
				return false;
		}
		else return true;
}
//-->
</script>
        
<style>
        
 .logo{                    
  position:absolute;          
  z-index:99; top:-120px; width:100px; left:50%; margin-left:-50px}                

body{font-family:arial;background:#f7f7f7;text-align:center; margin:0px; min-height:470px}
#error{margin:1em auto;background:#81BEDD;color:#FFFFFF;border:8px solid #FA4956;font-weight:normal;width:500px;text-align:center;position:relative;
width:90%; max-width:400px; border-radius:3px}
#entry{margin:0 auto;border:5px solid #fff; background:#fff;width:500px;text-align:left; border:5px solid #fff;box-shadow:0px 10px 65px rgba(0,0,0,0.3);
width:90%; max-width:400px; top:50%; margin-top:-125px; position:absolute; height:250px; left:50%; margin-left:-200px; border-radius:3px}
#entry a, #entry a:visited{color:#C8AF81}
#entry a:hover{ text-decoration:underline}
#entry h1{text-align:center;background:#2F4E4D;color:#fff;font-size:16px;padding:16px 25px;margin:0 0 1.5em 0; border-radius:0px; font-weight:normal; border-radius:3px}
#entry p{text-align:center;}
#entry div{margin:.5em 10px;background:#fff;padding:6px;text-align:right;position:relative; border-radius:4px}
#entry label{float:left;line-height:30px;padding-left:0px; font-size:13px; color:#999; font-weight:bold}
#entry .field{border:0px none;width:60%;font-size:12px;line-height:1em;padding:8px; border-radius:3px; outline:none; background:#fcfcfc;border:1px solid #ccc;color:#7d8c93}
	#entry .field::-webkit-input-placeholder{color:#ccc}
	 #entry .field:focus{  background:#fff;border:1px solid #aaa}
#entry div.submit{background:none;margin:1em 25px;text-align:center;}
#entry div.submit label{float:none;display:inline;font-size:11px;}
#entry button{border:0;padding:0 25px;height:40px;line-height:40px;text-align:center;font-size:13px;font-weight:bold;color:#333;background:#f1f1f1;cursor:pointer; border-radius:3px;
box-shadow:0px 1px 1px #ccc; }
	#entry button:hover{ background:#eaeaea}
.reds{ color:#000; text-decoration:none; width:calc(50% - 15px); float:left; text-align:center; font-size:12px; left:0px; margin-top:5px; text-align:left; margin-left:10px}
	.reds2{ left:auto;right:0px; text-align:right; margin-left:0px; margin-right:10px;width:calc(50% - 10px);}
	.fa.eye {
		display:none;
		right: 13px;
		position: absolute;
		top: 13px;
		cursor:pointer;
	}
 
@media only screen and (max-height: 400px){
	#entry{ margin-top:120px; top:0%}
}

@media only screen and (max-width: 480px){
	#entry{ left:50%; margin-left:-44.5%}
}

@media only screen and (max-width: 375px){
	#entry{ left:50%; margin-left:-45%}
	#entry div.formi{ padding:2px}
}
body{background:linear-gradient(to top, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)); background-size:cover;background-attachment:fixed}
body:before{background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300' viewBox='0 0 300 300' preserveAspectRatio='none'%3E%3Cpolygon points='0,300 300,0 300,300' style='fill:%23C0B892%3B' /%3E%3C/svg%3E")}

body:before {
	background-repeat: no-repeat;
	background-size: 100% 100%;
	content: '';
	display: block;
	height: 100%;
	position: fixed; bottom:0px;
	width: 100%;
}

</style>

</head>
<body>
    
    
	<?php
		// check for error messages
		/*if ($phpSP_message) {
			echo '<div id="error">'.$phpSP_message.'</div>';
		}*/
	?>
        
    <!-- ------ Have you set up phpSP with no users?  ------ -->
	<?php 
		/*if($useDatabase == false AND $useData == true AND $cfgLogin[1] == "")
			echo '	<p style="font-family:arial;font-size:22px;color:red;font-weight:bold;">WEBMASTER: It looks like you have no users or passwords set up! <br /><br /><span style="font-size:18px;">If you are not using a database, make sure you have configured<br>at least one user in config.php (around line 85).</span></p>';*/
	?>
	<!-- ------ Initial Setup (No Users) check ends here ------ -->


	
	<?PHP echo form_open(base_url("administrador/login"), ['name' => 'entry', 'id' => 'entry', 'onSubmit' => 'return checkData()', 'autocomplete' => 'off']) ?>
		
        
				
    
    
	<?PHP echo form_open(base_url("administrador/login"), ['name' => 'entry', 'id' => 'entry', 'onSubmit' => 'return checkData()', 'autocomplete' => 'off']) ?>
		<a class="logo" href="../index.php">
			<img src="<?PHP echo base_url('assetsAdmin/img/logo.jpg') ?>"/><!--assetsAdmin/img/logo.svg-->
		</a>

        <?PHP
			$cMsj = $this -> session -> flashdata('cMsj');
	
			if(isset($cMsj))
				echo "<h1>$cMsj</h1>";
			else
				echo "<h1>Pantalla de entrada</h1>";
		?>
        
        <div>
            <label for="login_username">Usuario</label> 
            <input type="text" name="enter_login" class="field required" autocomplete="off" required value="<?PHP echo set_value('enter_login') ?>" placeholder="Usuario"/>
        </div>                        
        <div>
            <label for="login_password">Password</label>
            <input type="text" name="enter_password" id="enter_password" class="field required" autocomplete="off" required value="<?PHP echo set_value('enter_password') ?>" placeholder="Password"/>
            <span class="eye fa fa-eye"></span>
        </div>                        
        <div class="submit">
            <?php echo form_button(array('type' => 'submit', 'content' => 'Entrar')) ?>
        </div>                        
        
    <?PHP echo form_close() ?>
    

	<script language="javascript">
		<!--
			document.forms[0].enter_login.select();
			document.forms[0].enter_login.focus();
		//-->
	</script>
</body>
</html>