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
    <div class="sale-title">
        <h1 class="add-request__title">Продажа объектов</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row" id="service-sale">
            <p>Если вы решили продать или сдавать в аренду вашу недвижимость и получать от этого дополнительный доход, рекомендуем вам обратиться в агенство недвижимости AlcisDom. Его специалисты профессионально и быстро проводят оценку жилой недвижимости с учетом всех значных факторов.</p>
            <p>Также мы поможем вам продать (отели, парковочные места, коммерческую недвижимость, земельные участки)</p>
            <p>Мы готовы встречать желающих осмотреть вашу собственность  и показать им то, что вы предлагаете, предоставить полную информацию об объекте, вести переговоры и  переписку и отвечать на вопросы интересующихся покупателей.</p>
        </div>
    </div><!-- .container -->
</div><!-- .content-->