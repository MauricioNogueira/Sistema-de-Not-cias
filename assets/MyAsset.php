<?php

	namespace app\assets;

	use yii\web\AssetBundle;

	class MyAsset extends AssetBundle{

		public $path = '@webroot';
		public $baseUrl = '@web';

		public $css = [
			'css/myCss.css'
		];

		public $js = [
			'js/formato-cpf.js',
			'js/funcoes-materialize.js'
		];

		public $depends = [
			\altiore\materialize\MaterializeAsset::class,
		];
	}