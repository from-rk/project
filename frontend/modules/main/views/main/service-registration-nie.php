<?php
use common\models\Request;
use common\models\LoginForm;
use frontend\filters\FilterAdvert;
use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\base\DynamicModel;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\base\Model;
?>

<div class="">
    <div class="nie-title">
        <h1 class="add-request__title">Оформление NIE</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row" id="service-nie">
            <p>Покупка недвижимости в Барселоне и в любом другом регионе Испании и ее регистрация невозможна без НИЕ (идентификационный номер иностранца, он же и налоговый номер, аналогом в России может стать ИНН). NIE необходим для подачи налоговой декларации при оплате налогов купле-продажи и при оформлении любой инвестиции. </p>
            <p>Наше агенство поможет в его в оформлении: подготовка всех необходимых документов, заполнение заявления, соправождение клиента в день подачи  заявления в отделение полиции а также получение NIE по доверенности от имени клиента согласно которой адвокаты могут получить ИНН, его получение может занять от 2 до 40 дней, в зависимости от населенного пункта.</p>
        </div>
    </div><!-- .container -->
</div><!-- .content-->