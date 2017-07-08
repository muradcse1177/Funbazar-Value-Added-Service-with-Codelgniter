<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Content House</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url();?>admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>admin/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>admin/css/style_responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>admin/css/style_default.css" rel="stylesheet" id="style_color" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body id="login-body">
    <div class="login-header">
        <div id="logo" class="center"><img src="<?php echo base_url();?>admin/img/logo.png" alt="logo" class="center" /></div>
    </div>
	
	<div id="login">
		<?php 
			if(validation_errors()){
		?>
    	<div class="alert" style="font_color:red;">
    		<?php
    			echo validation_errors();
    		?>
    	</div>
    	<?php
    		}
    	?>
		<?php 
			if(isset($errorLogin)){
    	?>
    	<div class="alert" style="font_color:red;">
    		<?php
    			echo $errorLogin;
    		?>
    	</div>
    	<?php
    		}
    	?>
        <form id="loginform" class="form-vertical no-padding no-margin" action="login/login_validation_check" method="post" />		
        <div class="lock"><i class="icon-lock"></i></div>
        <div class="control-wrap">
            <h2>User Login</h2> 
			<span  style="color:red"> <?php //echo $login_obj; ?></span> <br/>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                        <input id="input-username" name="username" type="text" placeholder="Username" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend"><span class="add-on"><i class="icon-key"></i></span>
                        <input id="input-password" name="password"  type="password" placeholder="Password" />
                    </div>
                    <div class="mtop10">
                        <div class="block-hint pull-left small">
                            <input type="checkbox" id="" /> Remember Me </div>
                        <div class="block-hint pull-right"><a href="javascript:;" class="" id="forget-password">Forgot Password?</a></div>
                    </div>
                    <div class="clearfix space5"></div>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
		
        </form>			
		<?php //include('footer.php');?>
		</div>
</body>
</html>