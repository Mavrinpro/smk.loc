<?php

namespace frontend\controllers;

use app\models\Files;
use frontend\models\IndexForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use \common\models\User;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\swiftmailer;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'bootstrap';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout' , 'confirm-email', 'reset-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $userId = \Yii::$app->getUser()->id;
        $user = User::findOne(['id' => $userId]);
        $userRole = current(ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser(\Yii::$app->getUser()->id),
            'name'));

      if ($userRole == 'admin' || $userRole == 'superadmin'){
          return $this->render('index',[
              //'model' => $model,
              'user' => $user
          ]);
      }else{

          return $this->redirect(['/department/view', 'id' => $user->department_id]);
      }

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new IndexForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'login';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $roleUser = \Yii::$app->authManager->getRole('user');
            $user = \common\models\User::find()->orderBy('id DESC')->one();
            \Yii::$app->authManager->assign($roleUser, $user->getId());
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->render('confirm');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль установлен.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionConfirm()
    {
        $this->layout = 'login';
        return $this->render('confirm');
    }

    public function actionAjaxSelect()
    {
        $post = \Yii::$app->request->post();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $department = \app\models\Department::find()->where(['branch_id' => $post['id']])->all();
        $arr = [];
        $arr['label'] = '<label for="signupform-department_id">Отдел</label>';
        $arr['sel'] = '<select id="signupform-department_id" class="form-control" name="SignupForm[department_id]">';
        $arr['opt_empty'] = '<option value="">Выберите свой отдел</option>';
        foreach ($department as $item) {
            $arr['id'][] = '<option value="'.$item->id.'">'.$item->name.'</option>';
            //$arr['name'][] = $item->name;
        }
        $arr['sel_close'] = '</select>';
        return $arr;
    }

    // сменить роль пользователя
    public function actionRoles()
    {
        $manager = Yii::$app->authManager;
        //$item = $manager->getRole('user');
        //$item = $item ? : $manager->getPermission('user');
        //$manager->revoke($item,'48');

        $authorRole = $manager->getRole('admin');
        $manager->assign($authorRole, 48);
    }


    // Загрузка файлов Dropzone
    public function actionUpload()
    {
        $fileName = 'file';
        $uploadPath = './files';
        $files = new Files();
        $user = \common\models\User::find()->where(['id' => Yii::$app->user->getId()])->one();
        $get = Yii::$app->request->post('department_id');
        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
//                $cookies = Yii::$app->request->cookies;
//                if (($cookie = $cookies->get('filefolder')) !== null) {
//                    $filefolder = $cookie->value;
//                }
                //Now save file data to database
                $files->name = $file->name;
                $files->department_id = Yii::$app->request->get('id'); // id отдела
                $files->file_folder = Yii::$app->request->get('filefolder'); // id раздела файлов
                $files->date_at = time();
                $files->user_id = Yii::$app->user->getId();
                $files->save();
                echo \yii\helpers\Json::encode($file->name);
            }
        }

        return false;
    }
}
