<?php

namespace frontend\controllers;

use common\models\Type;

/**
 * Class TypeController
 * @package frontend\controllers
 */
class TypeController extends BaseController
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

        self::openGraph([
            'title' => $type->name,
            'description' => strip_tags($type->annotation),
        ]);

        return $this->render('view', [
            'type' => $type,
        ]);
    }
}
