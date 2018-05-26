<?php

namespace app\controllers;

use app\models\Note;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function actionTest()
    {
        //-------------------------------------------------------------------------------

        $user                = new User();
        $user->username      = 'Pilot';
        $user->name          = 'Joseph';
        $user->surname       = 'Heller';
        $user->password_hash = '323232';
        //_end($user->save());

        $values = [
            'username'      => "Cuckoo\'s nest",
            'name'          => 'Ken',
            'surname'       => 'Kesey',
            'password_hash' => '33333',
        ];
        $user             = new User();
        $user->attributes = $values;
        //_log($user->save());

        //-----------------------------------------------------------------------------
        /*
        $users = User::find();
        _end($users->where(['>', 'id',  5])->asArray()->all());
         */
        /*
        $user = User::findOne(2);
        _end($user->getNotes()->orderBy('id DESC')->asArray()->all());
         */
        /*
        $user = User::findOne(1);
        _end($user->notes);
         */

        //-------------------------------------------------------------------------------
        /*
        $user = User::findOne(3);
        $note = new Note();
        $note->text = 'The best reading is re-reading';
        $note->link('creator', $user);
         */
        /*
        $user1 = User::findOne(1);
        $note = new Note();
        $note->text = 'ПИНС!';
        $note->link('creator', $user1);
         */
        $user2      = User::findOne(2);
        $note       = new Note();
        $note->text = 'ПУМС!';
        //$note->link('creator', $user2);

        //-------------------------------------------------------------------------------

        $usersWithNotes = User::find()->with([User::RELATION_NOTES])->where(['<', 'id', 5])->asArray()->all();
        //_log($usersWithNotes);

        //------------------------------------------------------------------------------

        $usersWithNotes = User::find()->joinWith([User::RELATION_NOTES])->asArray()->all();
        //_log($usersWithNotes);
        //_end($usersWithNotes[0]);

        //-------------------------------------------------------------------------------

        //_end(User::findOne(1)->getAccessedNotes()->asArray()->all());

        //-------------------------------------------------------------------------------

        $user = User::findOne(1);
        $note = Note::findOne(6);
        $note->link(Note::RELATION_ACCESSED_USERS, $user);

        //------------------------------------------------------------------------------

        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

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
     * Lists all User models.
     * @return mixed
     */

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        $model->scenario = User::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User успешно создан');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->scenario = User::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User успешно изменен');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
