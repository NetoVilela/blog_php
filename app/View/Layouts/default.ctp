<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->element('head'); ?>
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>
<body>

	<nav class="container-fluid navbar navbar-default ">
		<div class="menu">
			<ul class="nav navbar-nav menu">
				<li class="menu-li">
					<a href="/">Início</a>
				</li>

				<?php if(!AuthComponent::user('username')): ?>
					<li class="menu-li">
						<a href="/users/login">Login</a>
					</li>
					<li class="menu-li">
						<a href="/users/add">Cadastre-se</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>

		<?php  if(AuthComponent::user('username')): ?>
			<div class="secondary-menu">
				<div class="name-user">
					<?php echo AuthComponent::user('name'); ?>
				</div>
					<a href="/users/logout" class="btn btn-logout text-danger ">Logout</a>
			</div>
		<?php endif; ?>
	</nav>

	<div class="container">
		<div id="content">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

		<footer class="panel panel-default rodape bg-light">
			<div class="panel-heading">
				<p class="text-center">&copy; Blog cake-php</p>
			</div>
			<div class="panel-body bg-muted">
				<!-- <p class="text-center">Desenvolvido por Neto Vilela</p> -->
			</div>
		</footer>

	<script src="/app/webroot/js/jquery-3.6.0.min.js"> </script>
	<script src="/app/webroot/js/bootstrap.min.js"></script>

</body>
</html>
