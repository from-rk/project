<div class="row contact">
    <h1 class="add-request__title">Связаться </h1>
    <div class="col-lg-6 col-sm-6">

        <?php
        $form = \yii\bootstrap\ActiveForm::begin([
            'layout' => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3',
                    'wrapper' => 'col-sm-9',
                ],
            ],
        ]);
        ?>

        <?= $form->field($model, 'name')->label('Имя') ?>
        <?= $form->field($model, 'tel')->label('Телефон') ?>
        <?= $form->field($model, 'email')->label('Email') ?>
        <?= $form->field($model, 'subject')->label('Тема') ?>
        <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Сообщение') ?>

        <?=\yii\helpers\Html::submitButton('Отправить',['class' => 'btn btn-success']) ?>
        <?php
        \yii\bootstrap\ActiveForm::end();
        ?>


    </div>


    <div class="col-lg-6 col-sm-6">
        <h4 class="contact-contact">Риэлторское агенство в Барселоне "AlcisDom"</h4>
        <p class="contact-text"><b>Телефон:</b> (+34) 692 208 354,  (+34) 934 122 384</p>
        <p class="contact-text"><b>Email:</b> info@alcisdom.com</p>
        <p class="contact-text"><b>Адрес:</b> Passeig de Gràcia, 11, Bloque A, 7-1, 08007 Barcelona, España</p>
        <div id="map_canvas" style="width:100%; height:250px"></div><br/>


    </div>







</div>

<?php
$this->registerJs("
       var geocoder;
        var map;
        var marker;
        var markers = [];

        function initialize(){

              var latlng = new google.maps.LatLng(41.3850639,2.1734035);

            var options = {
                zoom: 14,
                center: latlng,
            };
            map = new google.maps.Map(document.getElementById('map_canvas'), options);
            geocoder = new google.maps.Geocoder();

        }



            


        });"

);
?>