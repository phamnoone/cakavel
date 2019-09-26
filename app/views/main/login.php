<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="POST">
					<span class="login100-form-logo">
						<img src="/public/images/logo.png"  width="120%">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Wellcome TLU
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" required placeholder="Username">
					
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" required placeholder="Password">
						
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<span class="login100-form-title mt-2 mb-4" style="font-size: 20px;">
						<?php echo $message; ?>
					</span>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>