<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="first-foot">
					<img src="/images/logowhite.png"  alt="alcis dom" class="foot-logo">
					<p class="realestate">real estate</p>
				</div>
                <!--<h4>Услуги</h4>
                <ul class="row"> 
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/search-real-estate" >Поиск недвижимости</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/sale-real-estate" >Продажа недвижимости</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/support-real-estate-deal" >Сопровождение сделки адвокатом</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/consult" >Консультирование</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/creating-corporate-structure" >Создание корпоративной структуры</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/registration-nie" >Регистрация НИЕ</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/service/immigration-issues-and-residence-registration" >Оформление резиденции</a></li>
                </ul> Vika-->
				
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 services">
				<h4>Услуги</h4>
                <ul class="row"> 
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/search-real-estate" >Поиск недвижимости</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/sale-real-estate" >Продажа недвижимости</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/support-real-estate-deal" >Сопровождение сделки адвокатом</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/consult" >Консультирование</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/creating-corporate-structure" >Создание корпоративной структуры</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/registration-nie" >Регистрация НИЕ</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-6"><a href="/service/immigration-issues-and-residence-registration" >Оформление резиденции</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 social">
                <h4>Социальные сети и подписка</h4>
                <a href="#"><img src="/images/facebook3.png"  alt="facebook"></a>
                <a href="#"><img src="/images/twitter3.png"  alt="twitter"></a>
                <a href="#"><img src="/images/linkedin3.png"  alt="linkedin"></a>
                <a href="#"><img src="/images/instagram3.png"  alt="instagram"></a>
				<p>Получать информацию о специальных предложениях и важных новостях сайта.</p>
                <?php
                    echo \yii\helpers\Html::beginForm('','post', ['class' => 'form-inline']);
                ?>


                <?php
                    echo \yii\helpers\Html::textInput('search', '', ['class' => 'form-control', 'placeholder' => 'Ваш Email']);
                ?>
                <?php
                    echo \yii\helpers\Html::submitButton('Подписаться', ['class' => 'btn btn-success']);
                ?>


                <?php
                    echo \yii\helpers\Html::endForm();
                ?>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 contact">
                <h4>Контакты</h4>
                <!--<p><b>Риэлторское агенство "AlcisDom"</b><br>-->
                    <p><span class="glyphicon glyphicon-map-marker"></span>  Passeig de Gràcia, 11, Bloque A, 7-1<br>
					08007 Barcelona, España</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>  info@alcisdom.com</p>
                    <p><span class="glyphicon glyphicon-earphone"></span>  (+34) 692 208 354<br>
                    <span class="glyphicon glyphicon-earphone"></span>  (+34) 934 122 384</p>
            </div>
        </div>


    </div>
	<p class="copyright">Alcisdom.com Copyright 2016. All rights reserved.	</p>
	</div>