<?php

namespace frontend\controllers;

use common\models\BannerImage;
use common\models\FindImage;
use common\models\Type;
use common\models\Category;
use common\models\Find;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;

/**
 * Manager controller
 */
class ManagerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['manager'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'type-delete' => ['post'],
                    'category-delete' => ['post'],
                    'find-delete' => ['post'],
                    'image-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionType()
    {
        $types = Type::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('type_list', ['types' => $types]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionTypeCreate()
    {
        $model = new Type();

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/type-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('type_create', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionTypeUpdate($id)
    {
        $model = Type::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('type_update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionTypeDelete($id)
    {
        $model = Type::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        if (empty($model->categories)) {
            $model->delete();
        } else {
            \Yii::$app->session->setFlash('error', 'Невозможно удалить данный регион, так как к нему привязаны памятники');
        }

        return $this->redirect(['manager/type']);
    }

    /**
     * @return string
     */
    public function actionCategory()
    {
        $categories = Category::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('category_list', ['categories' => $categories]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionCategoryCreate()
    {
        $model = new Category();

        $types = Type::find()->all();
        $data = ArrayHelper::map($types, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/category-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('category_create', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionCategoryUpdate($id)
    {
        $model = Category::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        $types = Type::find()->all();
        $data = ArrayHelper::map($types, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->save()) {
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('category_update', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionCategoryDelete($id)
    {
        $model = Category::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $model->delete();

        return $this->redirect(['manager/category']);
    }

    /**
     * @return string
     */
    public function actionFind()
    {
        $finds = Find::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('find_list', ['finds' => $finds]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionFindCreate()
    {
        $model = new Find();

        $types = Category::find()->all();
        $data = ArrayHelper::map($types, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/find-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('find_create', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionFindUpdate($id)
    {
        $model = Find::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        $types = Category::find()->all();
        $data = ArrayHelper::map($types, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->save()) {
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('find_update', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionFindDelete($id)
    {
        $model = Find::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $model->delete();

        return $this->redirect(['manager/find']);
    }

    public function actionFindImage($id)
    {
        $model = Find::find()->multilingual()->where(['id' => $id])->one();
        $query = FindImage::find()->where(['find_id' => $id]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        if (empty($model)) {
            throw new HttpException(500);
        }

        if ($model->load(\Yii::$app->request->post())) {
            $model->fileImages = UploadedFile::getInstances($model, 'fileImages');
            if ($model->uploadImages()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");
                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('find_image', [
            'model' => $model,
            'provider' => $provider,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionImageUpdate($id)
    {
        $model = FindImage::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }


        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");
                return $this->redirect(['manager/find-image', 'id' => $model->find->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('image_update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionImageDelete($id)
    {
        $model = FindImage::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $find = $model->find;
        $model->delete();

        return $this->redirect(['manager/find-image', 'id' => $find->id]);
    }

    /**
     * @return string
     */
    public function actionBannerImage()
    {
        $bannerImages = BannerImage::find()->orderBy(['position' => SORT_ASC])->all();

        return $this->render('banner_image_list', ['bannerImages' => $bannerImages]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionBannerImageCreate()
    {
        $model = new BannerImage();

        if ($model->load(\Yii::$app->request->post())) {
            $reposition = false;
            $bannerImageItemMaxPosition = BannerImage::find()->orderBy('position DESC')->one();
            $maxPosition = empty($bannerImageItemMaxPosition) ? 0 : $bannerImageItemMaxPosition->position;
            if (!empty($model->position)) {
                $reposition = true;
                $model->position = $model->position > ($maxPosition + 1) ? ($maxPosition + 1) : $model->position;
            } else {
                $model->position = $maxPosition + 1;
            }
            if ($model->save()) {
                if ($reposition) {
                    \Yii::$app->db->createCommand('update ' . BannerImage::tableName() . ' set position = position + 1 where position >= :position and id != :id', [
                        ':id' => $model->id,
                        ':position' => $model->position,
                    ])->execute();
                }
                $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/banner-image-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('banner_image_create', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionBannerImageUpdate($id)
    {
        $model = BannerImage::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        if ($model->load(\Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            $reposition = false;
            $oldPosition = $model->oldAttributes['position'];
            $bannerImageItemMaxPosition = BannerImage::find()->orderBy('position DESC')->one();
            $maxPosition = empty($bannerImageItemMaxPosition) ? 0 : $bannerImageItemMaxPosition->position;
            if ($model->position != $oldPosition and !empty($model->position)) {
                $reposition = true;
                $model->position = $model->position > $maxPosition ? $maxPosition : $model->position;
            } elseif (empty($model->position)) {
                $model->position = $maxPosition + 1;
            }

            if ($model->save()) {
                if ($reposition) {
                    if ($model->position < $oldPosition) {
                        \Yii::$app->db->createCommand('update ' . BannerImage::tableName() . ' set position = position + 1 where position >= :newPosition and position <= :oldPosition and id != :id', [
                            ':id' => $model->id,
                            ':newPosition' => $model->position,
                            ':oldPosition' => $oldPosition,
                        ])->execute();
                    } else {
                        \Yii::$app->db->createCommand('update ' . BannerImage::tableName() . ' set position = position - 1 where position <= :newPosition and position >= :oldPosition and id != :id', [
                            ':id' => $model->id,
                            ':newPosition' => $model->position,
                            ':oldPosition' => $oldPosition,
                        ])->execute();
                    }
                }
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('banner_image_update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionBannerImageDelete($id)
    {
        $model = BannerImage::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $model->delete();

        return $this->redirect(['manager/banner-image']);
    }
}
