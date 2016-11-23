<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>

<div class="container about-us">
    <div class="row">
        <h1 class="add-request__title">Продать объект недвижимости</h1>
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

           <h2 class="add-advert-h2">Описание объекта недвижимости</h2>

           <?= $form->field($model, 'type')->dropDownList(['0'=>'Жилая','1'=>'Коммерческая'])->label('Тип объекта недвижимости') ?>
           <?= $form->field($model, 'city')->textInput()->label('Город') ?>
           <?= $form->field($model, 'address')->textInput()->label('Адрес') ?>
           <div id="map_canvas" style="width:100%; height:250px"></div><br/>
           <?= $form->field($model, 'location')->hiddenInput()->label(false) ?>
           <?= $form->field($model, 'area',[
               'inputOptions' => [
                   'placeholder' => 'кв. М.',
               ],
           ])->textInput()->label('Площадь') ?>

           <?= $form->field($model, 'price',[
               'inputOptions' => [
                   'placeholder' => 'Евро',
               ],
           ])->textInput()->label('Стоимость') ?>

           <?= $form->field($model, 'encumbrance')->textInput()->label('Наличие обременений') ?>

           <?= $form->field($model, 'description',[
               'inputOptions' => [
                   'placeholder' => 'Наличие басейна,  лифта, парковочных мест, количествово спален, сан. узлов и т.д.',
               ],
           ])->textarea()->label('Содержание и Оборудование ') ?>

           <h2 class="add-advert-h2">Контактные данные</h2>

           <?= $form->field($model, 'tel')->textInput()->label('Номер телефона') ?>

           <?= $form->field($model, 'contactAddress')->textInput()->label('Адрес проживания') ?>

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



                   <?= Html::submitButton('Продолжить',['class' => 'btn btn-success btn-form']) ?>


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

          function DeleteMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
                }
                markers = [];
            }

        function findLocation(val){

            geocoder.geocode( {'address': val}, function(results, status) {

            var location = results[0].geometry.location
            map.setCenter(location)
            map.setZoom(15)
            DeleteMarkers()

            $('#advert-location').val(location)

             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: location
            });

          google.maps.event.addListener(marker, 'dragend', function()
        {
                    $('#advert-location').val(marker.getPosition())
        });

        markers.push(marker);

        })
        }

        $(document).ready(function() {

            initialize();

            if( $('#advert-address').val()){
             _location = $('#advert-address').val()
               findLocation(_location)
               }

            $('#advert-address').bind('blur keyup',function(){
               _location = $('#advert-address').val()
               findLocation(_location)
            })


        });"

           );
           ?>

           <?php ActiveForm::end(); ?>

            </div>

        </div> <!-- .row -->
    </div><!-- .container -->
</main><!-- .content-->