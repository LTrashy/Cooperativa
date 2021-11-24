<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing up</title>
</head>
<body>
    <?php require 'views/header.php'?>
    <p>
        <?php $this->showMessages();?>
        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
					<span class="login100-form-title">
						Registrarse
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username" required autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" required autocomplete="off">
						<span class="focus-input100"></span><br><br>
					</div>
                    
					<!-- <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div> -->

					<div class="container-login100-form-btn">
						
						<input class="login100-form-btn" type="submit" value="Sing in">
						
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							You have an account?
						</span>

						<a href="<?= URL ?>login" class="txt3">
							Log in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    </p>
</body>
</html>