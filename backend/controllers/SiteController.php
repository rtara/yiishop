<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
           /* 'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ], */
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()

    {
        $model = new LoginForm();
        return $this->render('index',compact('model'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			$user=Yii::$app->user->identity;
			$auth = \Yii::$app->authManager; 			
			$authorRole = $auth->getRole($user->group);
			$auth->assign($authorRole, $user->id);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionUsers()
    {	
		$users = User::find()->orderBy(['username' => SORT_DESC]);
		$uscount=$users->count();
		$pagination = new Pagination(['totalCount' => $uscount, 'pageSize'=>20]);
		$users=$users->offset($pagination->offset)
				->limit($pagination->limit)
				->all();
		return $this->render('users',  [ 'users'=>$users, 'pagination'=>$pagination] );
    }
		
	public function actionEdituser()
    {
		$id= Yii::$app->request->get('id',null);
		$user = User::find()->where(['id' => $id]) ->one();
		$username=Yii::$app->request->post('username',null);
		$email=Yii::$app->request->post('email',null);
		$group=Yii::$app->request->post('group',null);
		$created_at=Yii::$app->request->post('created_at',null);
		$password_hash=Yii::$app->request->post('password_hash',null);
		if ($username and $username!=$user->username)
			$user->username=$username;
		if ($email and $email!=$user->email)
			$user->email=$email;
		if ($group and $group!=$user->group)
			$user->group=$group;
		if ($password_hash and $password_hash!=$user->password_hash)
			$user->password_hash=$password_hash;
		\Yii::$app->getSession()->setFlash('error', 'User '.$user->username.' has been updated');	
		$user->save();
		return $this->redirect(Yii::$app->request->referrer);
	}
	
	public function actionDeleteuser()
	{
		$id= Yii::$app->request->get('id',null);
		foreach (User::find()->where(['id' => $id])->all() as $user) {
			\Yii::$app->getSession()->setFlash('error', 'User '.$user->username.' deleted');
			$user->delete();
		}
		return $this->redirect(Yii::$app->request->referrer);
	}
}
