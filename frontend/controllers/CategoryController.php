<?php
namespace frontend\controllers;

use common\models\Category;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Class CategoryController
 * @package frontend\controllers
 */
class CategoryController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = Category::find()->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'category' => $category,
        ]);
    }
}
