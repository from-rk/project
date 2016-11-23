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
        <div class="row add-advert">

           <?php $form = ActiveForm::begin([
               'layout' => 'horizontal',
               'fieldConfig' => [
                   'horizontalCssClasses' => [
                       'label' => 'col-sm-3',
                       'wrapper' => 'col-sm-9',
                   ],
               ],
           ]); ?>
            <h2 class="add-advert-h2">Личные данные</h2>
            <?= $form->field($model, 'fullName')->textInput()->label('Имя и фамилия') ?>
            <?= $form->field($model, 'passport')->textInput()->label('Паспорт') ?>
            <?= $form->field($model, 'nie')->textInput()->label('NIE') ?>
            <?= $form->field($model, 'tel')->textInput()->label('Номер телефона') ?>
            <?= $form->field($model, 'email')->textInput()->label('Email') ?>
            <?= $form->field($model, 'region')->textInput()->label('Регион проживания') ?>
            <?= $form->field($model, 'zipcode')->textInput()->label('Индекс проживания') ?>
            <?= $form->field($model, 'address')->textInput()->label('Адрес проживания') ?>
            <?= $form->field($model, 'fromName',[
                'inputOptions' => [
                    'placeholder' => 'Заполните это поле, если Вы действуете в интересах 3-го лица',
                ],
            ])->textInput()->label('От имени') ?>
            <h2 class="add-advert-h2">Описание желаемого объекта недвижимости</h2>
            <?= $form->field($model, 'properties',[
                'inputOptions' => [
                    'placeholder' => 'Опишите характеристики объекта поиска в свободной форме',
                ],
            ])->textarea()->label('Характеристики') ?>
            <?= $form->field($model, 'location')->textInput()->label('Место расположения') ?>
            <?= $form->field($model, 'maxPrice',[
                'inputOptions' => [
                    'placeholder' => 'Евро',
                ],
            ])->textInput()->label('Максимальная стоимость') ?>


            <div class="check-serv">
                <a class="btn btn-primary btn-addrequest" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Условия оказания услуг
                </a>
                <?= $form->field($model, 'accepted')->checkbox()->label('Согласен с условиями оказания услуг и обработку персональных данных') ?>
            </div>


            <div class="collapse" id="collapseExample">
                <div class="well">
                    <p>Данный заказ действует в течение 1 (одного) года и может быть продлен по окончании срока действия в письменном виде. Срок права получения гонораров устанавливается на 5 лет с настоящего момента и только в случае, если какой-либо из предложенных объектов недвижимости был куплен заказчиком, либо любым другим юридическим или физическим лицом, которое он представляет, либо которым владеет, либо любым из членов его семьи.</p>
                    <p>При отправлении заявки Вы принимаете условия по начислению гонорара риэлтора.</p>
                    <p><b>Условия по начислению гонорара риэлтора.</b></p>
                    <p>Гонорар KOPERUS BUSINESS & LEGAL SERVICES SL составляет 5% от стоимости недвижимого объекта.  Гонорар оплачивается в момент оформления нотариальной сделки купли-продажи. </p>
                    <p>В случае если составляется предварительный договор, то оплачивается 5% от суммы полученной в качестве предоплаты и остальная часть гонорара на моент оформления нотариальной сделки.</p>
                </div>
            </div>

            <?= Html::submitButton('Отправить заявку',['class' => 'btn btn-success btn-form']) ?>


           <?php ActiveForm::end(); ?>
        </div>
    </main><!-- .content -->
</div><!-- .container-->