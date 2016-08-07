<?php

namespace app\module\cms\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
// models
use \app\models\Taxonomy;
use app\models\Post;
use app\module\cms\models\PostSearch;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends BackendController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_post]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_post]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUploadcoverphoto() {
        if ($_POST) {
            var_dump($_POST);
        }
    }

    // Article Start 

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionArticlecreate() {
        $model = new Post();
        $model->id_taxonomy = Taxonomy::TAXONOMY_ARTICLE;

        if ($model->load(Yii::$app->request->post())) {

            $model->coverFile = \yii\web\UploadedFile::getInstance($model, 'coverFile');
            $file = 'uploads' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . date('Y-m-d') . '_' . Yii::$app->Tools->strToFilename($model->title) . '.' . $model->coverFile->extension;
            $model->coverFile->saveAs($file);
            $model->cover_photo = $file;
            if ($model->save()) {
                return $this->redirect(['post/articleview', 'id' => $model->id_post]);
            } else
                var_dump($model->getErrors);
        } else {
            return $this->render('article/create', [ 'model' => $model]);
        }
    }

    public function actionArticleindex() {
        $searchModel = new PostSearch();
        $searchModel->id_taxonomy = Taxonomy::TAXONOMY_ARTICLE;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('article/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionArticleview($id) {
        return $this->render('article/view', [
                    'model' => $this->findModel($id),
        ]);
    }

    // Article Finish
}
