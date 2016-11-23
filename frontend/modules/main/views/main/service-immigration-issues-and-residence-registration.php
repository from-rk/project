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
    <div class="migrate-title">
        <h1 class="add-request__title">Иммиграционные вопросы и оформление резиденции</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row" id="service-migrate">
            <p class="advocate-subtitle">В нашем агенстве Вы сможете получить полную информацию о правах и требованиях для получения вида на жительство в Испании, а также юридическую поддержку при оформлении документов. </p>
            <p><i class="fa fa-check" aria-hidden="true"></i>  ВНЖ в Испании на основании инвестиций, например, покупка жилой или коммерческой недвижимости на сумму не менее 500 тыс. Евро, инвестиция в доли/ акции испанских компаний на сумму от 1.000.000.-евро  (Residencia del Inversor, также популярно известна как  “Golden Visa”)</p>
            <p><i class="fa fa-check" aria-hidden="true"></i>  ВНЖ в Испании с целью работы по найму или ведения собственного бизнеса (Permiso de Residencia y trabajo)</p>
            <p><i class="fa fa-check" aria-hidden="true"></i>  ВНЖ в Испаниии без права на работу при наличии достаточных собственных средств на проживние – от 2.150.- евро в месяц (Permiso de Residencia no lucrativo)</p>
            <p><i class="fa fa-check" aria-hidden="true"></i>  Временное пребывание в Испании на основании учебы (visado y tarjeta de estudiante)</p>
            <p><i class="fa fa-check" aria-hidden="true"></i>  ВНЖ в Испании с целью воссоединения семьи (agrupación familiar)</p>
        </div>
    </div><!-- .container -->
</div><!-- .content-->