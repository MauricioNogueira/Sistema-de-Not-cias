<?php
	use app\assets\MyAsset;

	MyAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="utf-8">
	<title><?= $this->title ?></title>
	<?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
	<nav id="navbar">
	    <div class="nav-wrapper blue darken-1">
	    	<div class="container">
			      <a href="/principal" class="brand-logo">World News</a>
			      <a href="#" data-activates="menu-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			      	<?php if(\Yii::$app->user->isGuest): ?>
			        <li><a href="/principal/login">Login</a></li>
			        <?php else: ?>
			        <li><a href="/admin/cadastrar-admin">Criar Admin</a></li>
			        <li><a href="/admin/meus-posts">Publicações</a></li>
			        <li><a href="/admin/novo-post">Publicar notícia</a></li>
			        <li><a href="/admin/tela-usuarios">Usuários cadastrados</a></li>
			        <li><a href="/admin/logout">Logout</a></li>	
			        <?php endif; ?>
			      </ul>
			      <ul class="side-nav" id="menu-mobile">
			      	<?php if(\Yii::$app->user->isGuest): ?>
			        <li><a href="/principal/login">Login</a></li>
			        <?php else: ?>
			        <li><a href="/admin/cadastrar-admin">Criar Admin</a></li>
			        <li><a href="/admin/meus-posts">Publicações</a></li>
			        <li><a href="/admin/novo-post">Publicar notícia</a></li>
			        <li><a href="/admin/tela-usuarios">Usuários cadastrados</a></li>
			        <li><a href="/admin/logout">Logout</a></li>
			        <?php endif; ?>
			      </ul>
			    </div>
			</div>
	  </nav>
	<?= $content ?>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>