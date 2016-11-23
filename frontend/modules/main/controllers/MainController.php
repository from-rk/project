<?php

namespace app\modules\main\controllers;

use Yii;
use kartik\mpdf\Pdf;
use common\models\Advert;
use mPDF;

use common\models\LoginForm;
use common\models\Request;
use common\models\Captcha;
use frontend\components\Common;
use frontend\filters\FilterAdvert;
use frontend\models\ContactForm;

use frontend\models\SignupForm;
use yii\base\DynamicModel;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use yii\web\User;
use \yii\widgets\LinkPager;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\MapAsset;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use yii\helpers\Url;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;


class MainController extends \yii\web\Controller
{
    public $layout = "inner";
    public $verifyCode;


    public function actions()
    {
        return [
            'captcha'=> [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model= Advert::find()->where(['visible' => '1']);

        return $this->render('index', ['model' => $model] );
    }

    public function behaviors()
    {
        return [
            [
                'only' => ['view-advert'],
                'class' => FilterAdvert::className(),

            ]
        ];
    }




    public function actionRegister(){

        $model = new SignupForm;


        if ($model->load(\Yii::$app->request->post()) && $model->signup()){

            //print_r($model->getAttributes());
            \Yii::$app->session->setFlash('success', 'Register success');

        }

        return $this->render('register', ['model' => $model]);
    }

    public function actionLogin(){

        $model = new LoginForm;

        if($model->load(\Yii::$app->request->post()) && $model->login()){

            $this->goBack();

        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout(){

        \Yii::$app->user->logout();

        return $this->goHome();

    }


    public function actionContact(){

        $model = new ContactForm();
        Yii::$app->view->registerJsFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyDrWGN_9hrom0XNaou6ToizzCbH2zCwV-I&sensor=false',['position' => \yii\web\View::POS_HEAD]);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            $body  = "<div>  Name: <b> ".$model->name."</b> </div>>";
            $body .= "<div>  Telefone: <b> ".$model->tel."</b> </div>>";
            $body .= "<div>  Subject: <b> ".$model->subject."</b> </div>>";
            $body .= "<div>  Text: <b> ".$model->body."</b> </div>>";
            $body .= "<div>  Email: <b> ".$model->email."</b> </div>>";


            Common::sendMail($model->subject, $body);

            //die;
        }

        return $this->render('contact',['model' => $model]);
    }

    public function actionFind($city='',$price='',$apartment = ''){
        $queryCity = new Query();
        $queryCity = Advert::find()
            ->select('city')
            ->where(['not', ['city' => null, 'city' => '']])
            ->where("visible=1")
            ->asArray()
            ->groupBy('city')
            ->all();

        $this->layout = 'sell';

        $query = Advert::find();
        $query->filterWhere(['like', 'city', $city])
            ->andFilterWhere(['type' => $apartment])
            ->where("visible=1");

        if($price){
            $prices = explode("-",$price);

            if(isset($prices[0]) && isset($prices[1])) {
                $query->andWhere(['between', 'price', $prices[0], $prices[1]]);
            }
            else{
                $query->andWhere(['>=', 'price', $prices[0]]);
            }
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $request = \Yii::$app->request;
        return $this->render("find", ['model' => $model, 'queryCity'=> $queryCity, 'pages' => $pages, 'request' => $request]);

    }

    public function actionViewAdvert($id){
        $model = Advert::findOne($id);
        Yii::$app->view->registerJsFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyDrWGN_9hrom0XNaou6ToizzCbH2zCwV-I');

        $data = ['name', 'email', 'text'];
        $model_feedback = new DynamicModel($data);
        $model_feedback->addRule('name','required');
        $model_feedback->addRule('email','required');
        $model_feedback->addRule('text','required');
        $model_feedback->addRule('email','email');


        if(\Yii::$app->request->isPost) {
            if ($model_feedback->load(\Yii::$app->request->post()) && $model_feedback->validate()){

                \Yii::$app->common->sendMail('Subject Advert',$model_feedback->text);
            }

        }

        $user = $model->user;
        $images = \frontend\components\Common::getImageAdvert($model,false);

        $current_user = ['email' => '', 'username' => ''];

        if(!\Yii::$app->user->isGuest){

            $current_user['email'] = \Yii::$app->user->identity->email;
            $current_user['username'] = \Yii::$app->user->identity->username;

        }

        $coords = str_replace(['(',')'],'',$model->location);
        $coords = explode(',',$coords);

        $coord = new LatLng(['lat' => $coords[0], 'lng' => $coords[1]]);
        $map = new Map([
            'center' => $coord,
            'zoom' => 20,
        ]);

        $marker = new Marker([
            'position' => $coord,
            'title' => Common::getTitleAdvert($model),
        ]);

        $map->addOverlay($marker);


        return $this->render('view_advert',[
            'model' => $model,
            'model_feedback' => $model_feedback,
            'user' => $user,
            'images' =>$images,
            'current_user' => $current_user,
            'map' => $map
        ]);

    }

    public function actionAddRequest(){
        $model = new Request();

        return $this->render('add_request', [
            'model' => $model,
        ]);

    }

    public function actionSellObject(){
        Yii::$app->view->registerJsFile('http://maps.googleapis.com/maps/api/js?key=AIzaSyDrWGN_9hrom0XNaou6ToizzCbH2zCwV-I&sensor=false',['position' => \yii\web\View::POS_HEAD]);
        $model = new Advert();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['step2']);
        } else {
            return $this->render('add_advert', [
                'model' => $model,
            ]);
        }

    }

    public function actionServiceSearchRealEstate(){

        return $this->render('service-search-real-estate');

    }

    public function actionServiceSaleRealEstate(){

        return $this->render('service-sale-real-estate');

    }

    public function actionServiceSupportRealEstateDeal(){

        return $this->render('service-support-real-estate-deal');

    }

    public function actionServiceConsult(){

        return $this->render('service-consult');

    }

    public function actionServiceCreatingCorporateStructure(){

        return $this->render('service-creating-corporate-structure');

    }

    public function actionServiceRegistrationNie(){

        return $this->render('service-registration-nie');

    }

    public function actionServiceImmigrationIssuesAndResidenceRegistration(){

        return $this->render('service-immigration-issues-and-residence-registration');

    }

    public function actionFileUploadGeneral(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("advert_id");
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id."/general");
            BaseFileHelper::createDirectory($path);
            $model = Advert::findOne($id);
            $model->scenario = 'step2';

            $file = UploadedFile::getInstance($model,'general_image');
            $name = 'general.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image  = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $model->general_image = $name;
            $model->save();

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            return true;

        }
    }

    public function actionFileUploadImages(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("advert_id");
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id);
            BaseFileHelper::createDirectory($path);
            $file = UploadedFile::getInstanceByName('images');
            $name = time().'.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            sleep(1);
            return true;

        }
    }

    public function actionStep2(){
        $id = Yii::$app->locator->cache->get('id');
        $model = Advert::findOne($id);
        $image = [];
        if($general_image = $model->general_image){
            $image[] =  '<img src="/uploads/adverts/' . $model->idadvert . '/general/small_' . $general_image . '" width=250>';
        }

        if(Yii::$app->request->isPost){
            $this->redirect(Url::to(['advert/']));
        }

        $path = Yii::getAlias("@frontend/web/uploads/adverts/".$model->idadvert);
        $images_add = [];

        try {
            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
                        $images_add[] = '<img src="/uploads/adverts/' . $model->idadvert . '/' . basename($file) . '" width=250>';
                    }
                }
            }
        }
        catch(\yii\base\Exception $e){}


        return $this->render("step2",['model' => $model,'image' => $image, 'images_add' => $images_add]);
    }


// Privacy statement output demo
    public function actionMpdfDemo1() {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => '<div>test test</div>',
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionPdf(){

	        $mpdf=new mPDF();

        $model = Advert::findOne(3);

	        $mpdf->WriteHTML($this->renderPartial('view-advert',[
                'model' => $model,
            ]));

	        $mpdf->Output();

	        exit;

	        //return $this->renderPartial('mpdf');

	    }

    public function actionPdff() {

        $model = Advert::findOne(10);

        $mpdf = new mPDF;
        $city = "dsf";

        $mpdf->Output();

        exit;

	    }

    public function actionForceDownloadPdf(){


        $mpdf=new mPDF();

        $mpdf->WriteHTML($this->renderPartial('<div>test test</div>'));

        $mpdf->Output('MyPDF.pdf', 'D');

        exit;

	    }


}
