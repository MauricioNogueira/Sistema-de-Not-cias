<?php

	namespace  app\controllers;

	use yii\web\Controller;
	use app\models\Usuario;
	use app\models\Noticia;
	use yii\data\Pagination;
	use yii\web\UploadedFile;
	use app\models\admin\ValidatorPost;
	use app\models\admin\ValidatorAlterarPost;
	use app\models\admin\ValidatorCadastrar;

	class AdminController extends Controller{

		public function actionIndex(){
			$usuario = Usuario::findOne(\Yii::$app->user->identity['id']);

			if(!\Yii::$app->user->isGuest){
				return $this->render('index', ['usuario' => $usuario]);
			}

			return $this->redirect(['/principal/login']);
		}

		public function actionCadastrarAdmin(){
			if(\Yii::$app->user->isGuest){
				return $this->redirect(['/principal/login']);
			}
			$model = new ValidatorCadastrar();

			if($model->load(\Yii::$app->request->post())){
				if(\Yii::$app->user->can('cadastrarAdmin')){
					if($model->validate()){
						$usuario = new Usuario();

						$usuario->nome_usuario = $model->nome_usuario;
						$usuario->data_nascimento = $model->data_nascimento;
						$usuario->rg = $model->rg;
						$usuario->cpf = $model->cpf;
						$usuario->password = \Yii::$app->getSecurity()->generatePasswordHash($model->password);

						$usuario->save();

						return $this->redirect(['/admin/cadastrar-admin']);
					}
				}
				return $this->redirect(['/admin/error']);
			}
			return $this->render('cadastrar-admin', ['model' => $model]);
		}

		public function actionNovoPost(){
			if(!\Yii::$app->user->isGuest){
				$model = new ValidatorPost();

				if($model->load(\Yii::$app->request->post())){
					$n = UploadedFile::getInstance($model, 'imagem');
					$model->imagem = 'imagens/'.$n->baseName.'.'.$n->extension;

					if($model->validate()){
						$noticia = new Noticia();

						$noticia->titulo = $model->titulo;
						$noticia->texto = $model->texto;
						$noticia->data_publicacao = date('Y-m-d');
						$noticia->usuario_id = \Yii::$app->user->identity['id'];
						$noticia->imagem = $model->imagem;
						
						if($noticia->upload($n)){
							$noticia->save();
							return $this->redirect(['/admin/novo-post']);
						}
					}

					return $this->render('novo-post', ['model' => $model]);

				}

				return $this->render('novo-post', ['model' => $model]);
			}

			return $this->redirect(['/principal/login']);
		}

		public function actionAlterarNoticia($id){
			$noticia = Noticia::findOne($id);

			if(!\Yii::$app->user->isGuest){
				if(\Yii::$app->user->identity['id'] == $noticia['usuario_id']){
					$validator = new ValidatorAlterarPost();

					if($validator->load(\Yii::$app->request->post())){
						if($validator->validate()){
							$noticia->titulo = $validator['titulo'];
							$noticia->texto = $validator['texto'];
							$noticia->save();

							return $this->redirect(['/admin/meus-posts']);
						}
					}

					return $this->render('alterar-noticia', ['model' => $validator, 'noticia' => $noticia]);
				}
				
				return $this->redirect(['/admin/error']);
			}

			return $this->redirect(['/principal/login']);
		}

		public function actionExcluirNoticia($id){
			$noticia = Noticia::findOne($id);

			if(\Yii::$app->user->isGuest){
				return $this->redirect(['/principal/login']);
			}

			if(\Yii::$app->user->identity['id'] == $noticia['usuario_id']){
				$noticia->delete();

				return $this->redirect(['/admin/meus-posts']);
			}

			return $this->redirect(['/admin/error']);
		}

		public function actionMeusPosts(){
			if(!\Yii::$app->user->isGuest){
				$query = Noticia::find()->where(['usuario_id' => \Yii::$app->user->identity['id']])->orderBy('id DESC');

				$pagination = new Pagination([
					'defaultPageSize' => 10,
					'totalCount' => $query->count(),
				]);

				$noticias = $query->offset($pagination->offset)->limit($pagination->limit)->all();

				return $this->render('meus-posts', ['noticias' => $noticias, 'pagination' => $pagination]);
			}

			return $this->redirect(['/admin/error']);
		}

		public function actionTelaUsuarios(){
			$query = Usuario::find();

			$pagination = new Pagination([
				'defaultPageSize' => 10,
				'totalCount' => $query->count(),
			]);

			$usuarios = $query->offset($pagination->offset)->limit($pagination->limit)->all();

			if(\Yii::$app->user->isGuest){
				return $this->redirect(['/principal/login']);
			}

			return $this->render('tela-usuarios', ['usuarios' => $usuarios, 'pagination' => $pagination]);
		}

		public function actionExcluirUsuario($id){
			if(\Yii::$app->user->isGuest){
				return $this->redirect(['/principal/login']);
			}
			if(\Yii::$app->user->can('excluir-usuario') && \Yii::$app->user->identity['id'] != $id){
				$usuario = Usuario::findOne($id);
				$usuario->delete();
				return $this->redirect(['/admin/tela-usuarios']);
			}else{
				$this->redirect(['/admin/error']);
			}
		}

		public function actionLogout(){
			if(!\Yii::$app->user->isGuest){
				\Yii::$app->user->logout();

				return $this->redirect(['/principal/login']);
			}else{
				return $this->redirect(['/admin/error']);
			}
		}

		public function actionError(){
			return $this->render('error');
		}
	}