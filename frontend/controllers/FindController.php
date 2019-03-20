<?php
namespace frontend\controllers;

use common\models\Find;

/**
 * Class FindController
 * @package frontend\controllers
 */
class FindController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $finds = Find::find()->all();

        return $this->render('index', [
            'finds' => $finds,
        ]);
    }

    public function actionView($id)
    {
        $find = Find::findOne($id);

        if (empty($find)) {
            throw new HttpException(404);
        }

        self::openGraph([
            'title' => $find->name,
            'description' => strip_tags($find->annotation),
            'image' => !empty($find->image) ? Find::SRC_IMAGE . '/' . $find->thumbnailImage : null,
        ]);

        return $this->render('view', [
            'find' => $find,
        ]);
    }
}
