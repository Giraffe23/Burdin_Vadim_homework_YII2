<?php

namespace app\controllers;

use app\models\Note;
use app\models\Access;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * NoteController implements the CRUD actions for Note model.
 */
class NoteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Note models.
     * @return mixed
     */
    public function actionMy()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Note::find()->byCreator(Yii::$app->user->id),
        ]);

        $dataProvider->pagination->pageSize = 10;
        $dataProvider->sort->defaultOrder   = ['id' => SORT_DESC];

        return $this->render('my', [
            //'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Note models.
     * @return mixed
     */
    public function actionShared()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Note::find()
            ->byCreator(Yii::$app->user->id)
            ->innerJoinWith(Note::RELATION_ACCESSES)
        ]);

        $dataProvider->pagination->pageSize = 15;
        $dataProvider->sort->defaultOrder   = ['id' => SORT_DESC];

        return $this->render('shared', [
            //'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Note models.
     * @return mixed
     */
    public function actionAccessed()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Note::find()
            ->innerJoinWith(Note::RELATION_ACCESSES)
            ->where(['user_id' =>Yii::$app->user->id])
        ]);

        $dataProvider->pagination->pageSize = 15;
        $dataProvider->sort->defaultOrder   = ['id' => SORT_DESC];

        return $this->render('accessed', [
            //'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Note model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $dataProvider = new ActiveDataProvider([
            'query' => Note::find()
            ->byCreator(Yii::$app->user->id)->where(['note.id' => $id])
            ->innerJoinWith(Note::RELATION_ACCESSES),

        ]);
        
        $model = $this->findModel($id);
        //$modelAccess = Access::find()->where(['note.id' => $id]);
        //_end($dataProvider);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Note model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model             = new Note();
        $model->creator_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заметка успешно создана');
            return $this->redirect(['my']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Note model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->creator_id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Доступ к изменению заметки запрещен');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Заметка успешно изменена');
            return $this->redirect(['my']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Note model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->creator_id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Доступ к удалению заметки запрещен');
        }
        $model->delete();

        Yii::$app->session->setFlash('success', 'Заметка успешно удалена');

        return $this->redirect(['my']);
    }

    /**
     * Finds the Note model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Note the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Note::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
