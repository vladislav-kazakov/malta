<?php
namespace frontend\controllers;

use common\models\Category;

/**
 * Class CategoryController
 * @package frontend\controllers
 */
class CategoryController extends BaseController
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

        self::openGraph([
            'title' => $category->name,
            'description' => strip_tags($category->annotation),
            'image' => !empty($category->image) ? Category::SRC_IMAGE . '/' . $category->thumbnailImage : null,
        ]);

        return $this->render('view', [
            'category' => $category,
        ]);
    }
}
