<?php

namespace app\controllers;

use app\models\Access;
use app\models\Note;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * AccessController implements the CRUD actions for Access model.
 */
class AccessController extends Controller
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
                    'deleteAll' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Access model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(int $noteId)
    {
        $modelNote = Note::findOne($noteId);
        if (!$modelNote || $modelNote->creator_id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Доступ к разрешениям закрыт');
        }

        $model          = new Access();
        $model->note_id = $noteId;

        $users = User::find()
            ->select('username')
            ->indexBy('id')
            ->where(['<>', 'id', Yii::$app->user->id])
            ->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Разрешение успешно добавлено');
            return $this->redirect(['note/my']);
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
        ]);
    }
    //------------------------------------------------
    /**
     * Deletes an existing Access model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteAll($noteId)
    {
        
        $modelNote = Note::findOne($noteId);
        if (!$modelNote || $modelNote->creator_id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Доступ к разрешениям закрыт');
        }
        $modelNote->unlinkAll(Note::RELATION_ACCESSED_USERS, true);
        
        Yii::$app->session->setFlash('success', 'Разрешения успешно удалены');
        return $this->redirect(['note/shared']);
    }

    /**
     * Deletes an existing Access model.
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

        Yii::$app->session->setFlash('success', 'Разрешение успешно удалено');

        return $this->redirect(['note/my']);
    }

    /**
     * Finds the Access model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Access the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Access::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
