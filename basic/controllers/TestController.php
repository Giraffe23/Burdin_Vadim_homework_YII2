<?php

namespace app\controllers;

use app\models\Test;
use yii\base\BaseObject;
use yii\db\Query;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\db\Connection;

class A extends BaseObject
{
    public function setProp($value)
    {
        return $value;
    }

    public function getProp()
    {
        return 233;
    }

}

class TestController extends Controller
{
    public function actionIndex()
    {
        _end(\Yii::t('yii', 'Login require {params}', ['params' => 'параметры']));

        //\Yii::setAlias('@wayToHome', 'C:/home');
        // _end(\Yii::$aliases);

        //_end(\Yii::getAlias('@wayToHome'));

        //_end(\Yii::getAlias('@webroot'));

        //_end(\yii\helpers\Url::toRoute(['note/view', 'id' => 23]));

        //-------------------Кэширование-----------------------
        /*
        $key = 'ghkjl';
        if (!$data = \Yii::$app->cach->get($key)) {
        $data = data();
        \Yii::$app->cach->set($key, $data, 3600);
        }

        if (\Yii::$app->cach->exists($key)) {
        $data = \Yii::$app->cach->get($key);
        } else {
        $filename = 'ghlk.txt';
        $data     = file_get_contents($filename);
        \Yii::$app->cach->set($key, $data, 3600, new FileDependency(['fileName' => $filename]));
        }

        //\Yii::$app->cache->delete();

        _end($data);
         */
        //---------------------------------------------------------

        /*
        $note = new Note();
        $note->text = 'testing behaviors';
        $note->creator_id = 1;
        //$note->save();

        $user = User::findOne(5);
        $user->username = 'schwarz';
        $user->save();
         */

        /*
        $values = [
        'username' => 'Pilot',
        'name' => 'Joseph',
        'surname' => 'Heller',
        'password_hash' => '323232',
        ];
        $user = new User();
        $user->attributes = $values;
        _log($user->save());
         */
        /*
        $user = new User();
        $user->username = 'Dubliner';
        $user->name = 'James';
        $user->surname = 'Joice';
        $user->password_hash = '232323';
        _end($user->save());
         */
        /*
        $user = User::findOne(1);
        _end($user->getNotes()->asArray()->all());
         */

        /*
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_note', 'access', ['note_id'], 'note', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_note_user', 'note', ['creator_id'], 'user', ['id'])->execute();
         */

        /*------------3-----------------*/

        //\Yii::$app->db->createCommand()->insert('user', ['username' => 'Giraffe', 'name' => 'Vadim', 'surname' => 'Burdin', 'password_hash' => 555])->execute();
        //\Yii::$app->db->createCommand()->insert('user', ['username' => 'Arny', 'name' => 'Arnold', 'surname' => 'Strong', 'password_hash' => 999])->execute();
        //\Yii::$app->db->createCommand()->insert('user', ['username' => 'Beard', 'name' => 'Leo', 'surname' => 'Tolstoy', 'password_hash' => 777])->execute();

        /*------------4-----------------*/

        $queryUser_id_1  = (new Query())->from('user')->where(['id' => 1]);
        $queryUser_sort  = (new Query())->from('user')->where(['>', 'id', 1])->orderBy(['name' => SORT_ASC]);
        $queryUser_count = (new Query())->from('user'); //->count();//select(['Количество юзеров' => 'count(*)']);

        //_end($queryUser_id_1->all());
        //_end($queryUser_count->count());
        //_end($queryUser_sort->all());

        /*------------5-----------------*/

        /*
        \Yii::$app->db->
        createCommand()->batchInsert('note', ['text', 'creator_id', 'created_at'], [
        ['Hello!', 1, 12321],
        ['Hi!', 3, 12354],
        ["What's up?", 4, 45666414],
        ])->execute();
         */

        /*------------6-----------------*/
/*
$query = (new Query())->from('note');

_end($query->innerJoin('user', 'note.creator_id = user.id')->select([
'Текст сообщения' => 'note.text',
'Имя' => 'user.name',
'Фамилия' => 'user.surname',
'Логин' => 'user.username'
])->all());
 */

        /*================================-This is the end-=================================================*/

        return $this->render('index', [
            'model' => new Test(),
        ]);

    }
}

//_end($queryUser_count->one());
//_end($queryUser_sort->all());

//$obj = new A();
//$obj->prop = 233;
//return $obj->prop;
//exit();
//$service = new Service(['prop' => 23]);
//return \Yii::$app->service->run();
//exit();
//$model = new Knives(['id' => 1, 'name' => 'morakniv', 'price' => 1000]);
//$model->id    = 1;
//$model->name  = 'morakniv';
//$model->price = '1000 руб.';
//$models = Knives::find()->asArray()->all();
//return VarDumper::dumpAsString( $models, 5, true);
//return VarDumper::dumpAsString(ArrayHelper::getValue($models, '2.description'), 5, true);
/*
return VarDumper::dumpAsString(ArrayHelper::getColumn($models, function ($info) {
return '***' . $info['name'] . $info['id'] . '***';
}), 5, true);
 */
/*
return ArrayHelper::getValue($model->getAttributes(), function ($model) {
return '***' . $model['name'] . $model['id'] . '***';
});
 */
//var_dump($model->validate());
//$model->validate();
//var_dump($model->getErrors());
//$model = new Knives();
//$model->setAttributes(['id' => 1, 'name' => 'moraknivRobust', 'price' => 900]);
//\Yii::info(VarDumper::dumpAsString($model), 'congratulations');
//\Yii::info('hello', 'congratulations');
//_log($model);
//_end($model);
//$id = 10;
//_end(\Yii::$app->db->createCommand('SELECT [[name]], [[id]] FROM {{knives}} WHERE id<:id', [':id' => $id])->queryAll());
//_end(\Yii::$app->db->createCommand()->insert('knives', ['name' =>'razor', 'price' =>555])->execute());
/*
_end(\Yii::$app->db->
createCommand()->batchInsert('knives', ['name', 'price'], [
['knive_1', 333],
['knive_2', 303],
['knive_3', 330],
])->execute());
 */
/*
_end(\Yii::$app->db->
createCommand()->delete('x', 'id>::$id', [':id' => $id])->execute());
 */

//$queryUser = (new Query())->from('knives')->select('count(*)');
//$query = (new Query())->from('knives')->select(['Название'=>'name', 'Цена'=>'price', 'cnt' => $queryUser])->where(['>', 'id', 1] /*['id' => [1, 4, 5]]'id>:id', [':id' => 1]*/)->orderBy(['name' => SORT_ASC]);
//_end($query->all());
/*
Yii::$app->db->transaction(function($db) {
$db->createCommand($sql1)->execute();
$db->createCommand($sql2)->execute();
}
 */
