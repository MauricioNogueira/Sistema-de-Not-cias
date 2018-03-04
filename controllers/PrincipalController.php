<?php

	namespace app\controllers;

	use yii\web\Controller;
	use app\models\Usuario;
	use app\models\Noticia;
	use app\models\LoginValidator;

	class PrincipalController extends Controller{

		public function actionIndex(){
			if(\Yii::$app->user->isGuest){
				$noticias = Noticia::find()->joinWith('usuario')->limit(10)->orderBy('id DESC')->all();
				
				return $this->render('index', ['noticias' => $noticias]);
			}

			return $this->goBack('/admin/index');
		}

		public function actionLogin(){
			if(\Yii::$app->user->isGuest){
				$validator = new LoginValidator();
				$usuario = new Usuario();

				if($validator->load(\Yii::$app->request->post())){
					if($validator->validate()){
						$usuario = Usuario::findOne(['cpf' => $validator->cpf]);
						
						\Yii::$app->user->login($usuario);

						return $this->redirect(['/admin/index']);
					}
				}

				return $this->render('login', ['validator' => $validator]);
			}else{
				return $this->goBack('/admin/index');
			}
		}

		public function actionNoticia($id){
			if(\Yii::$app->user->isGuest){
				$noticia = Noticia::find()->joinWith('usuario')->where(['noticias.id' => $id])->one();

				return $this->render('noticia', ['noticia' => $noticia]);
			}

			return $this->redirect(['/admin/index']);

			// echo "<pre>";
			// echo var_dump($noticia);
			// echo "</pre>";
			// die();
		}
	}