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

<div class="container about-us">
    <div class="row">
        <h1 class="add-request__title">Заказать поиск объекта недвижимости</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row" id="service-search">
            <div class="title-search">
                <h3>Как мы работаем?</h3>
            </div>
            <div class="steps-search">
                <div class="col-md-4">
                    <div class="box-step">
                        <p>Вы информируете наших специалистов о ваших пожеланиях:</p>
                        <ul>
                            <li>тип недвижимости</li>
                            <li>место расположение</li>
                            <li>бюджет</li>
                        </ul>
                        <div class="number">1</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-step">
                        <p style="margin-bottom: 40px;">Согласно этим пожеланиям мы проводим предвариетльную подборку недвижимости</p>
                        <div class="number">2</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-step">
                        <p style="margin-bottom: 40px;">Договариваемся о встречах для  показа выбранных объектов</p>
                        <div class="number">3</div>
                    </div>
                </div>
            </div>
            <div class="questions">
                <div class="col-md-2 question">
                    <img src="/images/question.png">
                </div>
                <div class="col-md-10">
                    <!--Если Вы еще не определились с местоположением, мы:</p>
                    <p>Проинформируем о пристижных зонах </p>
                    <p>Ценовой политике</p>
                    <p>Подберем зоны с наличием школ, транспортных средств и других оснащений</p>-->

                    <p>Если Вы еще не определились с местоположением, то также в этом можем Вам помочь и провести обзорный визит. Проинформировать о пристижных зонах и ценовой политике, указать зоны с наличием школ, транспортных средств и других оснащений.</p>
                </div>
            </div>
            <div class="title-search">
                <h3>Как начать сотрудничеть с агентством?</h3>
            </div>
            <div class="col-md-12">
                <p>Заполните бланк или свяжитесь с нами, чтобы заказать нам поиск желаемого объекта. Мы сделаем подборку и предложем Вам несколько вариантов.</p>
            </div>
        </div>
    </div><!-- .container -->
</div><!-- .content-->