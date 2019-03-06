<?php
namespace frontend\controllers;

use common\models\Type;
use yii\web\Controller;

/**
 * Class TypeController
 * @package frontend\controllers
 */
class TypeController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $types = Type::find()->all();

        return $this->render('index', [
            'types' => $types,
        ]);
    }

    public function actionView($id)
    {
        $type = Type::findOne($id);

        if (empty($type)) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'type' => $type,
        ]);
    }
}
