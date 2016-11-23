<?php

namespace app\modules\main\controllers;

use yii\web\Controller;
use frontend\components\Common;
use yii\db\Query;
use common\models\Advert;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
{
    $this->layout = "bootstrap";
    $query = new Query();
    $query_advert = $query->from('advert')->where("visible=1")->orderBy('idadvert desc');
    $query1 = Advert::find()
        ->select('city')
        ->where(['not', ['city' => null, 'city' => '']])
        ->where("visible=1")
        ->asArray()
        ->groupBy('city')
        ->all();

    //$command = $query_advert->limit(5);
    //$result_general = $command->all();
    //$count_general = $command->count();

    $featured = $query_advert->where("visible=1")->limit(6)->all();
    //$recommend_query  = $query_advert->where("recommend= 1")->limit(5);
    //$recommend = $recommend_query->all();
    //$recommend_count = $recommend_query->count();

    return $this->render('index',[
        //'result_general' => $result_general,
        //'count_general' => $count_general,
        'featured' => $featured,
        'query_advert'=> $query_advert,
        'query1' => $query1,
        //'recommend' => $recommend,
        //'recommend_count' => $recommend_count

    ]);
}

    public function actionService(){

        $locator =\Yii::$app->locator;
        $cache = $locator->cache;

        $cache->set("test",1);
        print $cache->get("test");
    }

    public function actionEvent(){

        $component = new Common();
        $component->on(Common::EVENT_NOTIFY, [$component, "notifyAdmin"]);
        $component->sendMail("info@webart-on.com","subject","text messaje","test name");

    }

    public function actionLoginData(){

        print \Yii::$app->user->id;

    }
}
