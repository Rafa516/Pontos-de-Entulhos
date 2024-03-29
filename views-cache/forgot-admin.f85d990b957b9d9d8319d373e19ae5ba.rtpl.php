<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pontos de Entulhos</title>
	<link href="/res/user/img/icon.png" rel="icon">
	<link rel="stylesheet" href="/res/user/css/login_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

	<!--form area start-->

	<center><img src="/../res/admin/img/logo.png" class="logo" alt=""></center>

			
	<div class="form">



		<form class="login-form" action="/admin/forgot" method="post">

		<?php if( $profileMsg != '' ){ ?>

			<div class="alert alert-success">
				<?php echo $profileMsg; ?>

			</div>
			<?php } ?>

			<?php if( $error != '' ){ ?>

			<div class="alert alert-danger">
				<?php echo $error; ?>

			</div>
			<?php } ?>	

			<input    class="user-login" type="email" name="email" placeholder="Digite o seu e-mail" required>
		
			<input class="btn" type="submit" name="" value="Enviar">
			<div class="options-02">
				<p>Envie seu e-mail e receba as instruções para redefinir a sua senha.</p>
			</div>

			<div class="options-02">
				<p> <a href="/">Voltar</a></p>
			</div>
		</form>

		
		<!--login form end-->
		<!--signup form start-->

	
		<!--signup form end-->
	</div>
	<!--form area end-->

	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script src="/res/user/js/functions.js"></script>

	<script type="text/javascript">
		$('.options-02 a').click(function () {
			$('form').animate({
				height: "toggle", opacity: "toggle"
			}, "slow");
		});
	</script>

</body>

</html>