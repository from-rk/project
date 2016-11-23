<?php
    use yii\helpers\Html;
    use yii\base\Model;
    use tuyakhov\youtube;
    use frontend\components\Common;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use yii\bootstrap\Carousel;
?>




<div class="banner-search first-banner">
    <div class="container">
        <div class="searchbar">
            <div class="row"> <!--search from-->
               <?php
                    echo Html::beginForm(\yii\helpers\Url::to('main/main/find/'),'get');
               ?>

                <div class="col-lg-6 col-sm-6 block-form">
                    <h3>Купить квартиру, дом или коммерческую недвижимость</h3>
                    <?php
                         Html::textInput('search', '', ['class' => 'form-control', 'placeholder' => 'Search of Properties']);
                    ?>

                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <?php
                                $items=ArrayHelper::map($query1,'city', 'city');
                                echo Html::dropDownList('city','', $items
                                    , ['class' => 'form-control', 'prompt' => 'Город']
                                );
                            ?>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <?php
                                echo Html::dropDownList('price', '', [
                                    '50000-150000' => '€50,000 - €150,000',
                                    '150000-250000' => '€150,000 - €250,000',
                                    '250000-350000' => '€250,000 - €350,000',
                                    '300000' =>'от €300,000',
                                ], ['class' => 'form-control', 'prompt' => 'Цена']
                                );
                            ?>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <?php
                                echo Html::dropDownList('type', '', [
                                    'residential' => 'Жилая',
                                    'commercial'=> 'Коммерческая',
                                ], ['class' => 'form-control', 'prompt' => 'Жилая и Коммерческая']
                                );
                            ?>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <?php
                                echo Html::submitButton('Поиск',['class' => 'btn btn-success']);
                            ?>
                        </div>

                        <?php
                            echo Html::endForm();
                        ?>

                    </div>

                </div>

            </div>   <!--end search form-->

        </div> <!--end searchbar-->

    </div> <!--container-->

</div> <!--banner-search first-banner-->


<div class="container about-us">
     <div class="row">
         <h1 class="about-us__title">Агенство недвижимости "AlcisDom"</h1>
         <div class="col-md-12">
             <div class="col-md-7 about-text">
                 <p><b>Агенство недвижимости  "AlcisDom"</b> это проекция  <b>долголетнего опыта в оформлении сделок  с недвижемой собственностью</b> и иных родов инвестиций в Испании.</p>
                 <p>В агенстве "AlcisDom" Вы  сможете <b>заказать поиск</b> желаемого объекта любого вида <b>недвижимости</b> (жилую/коммерческую/сельскую), <b>заключить договор на продажу</b> своей собственности, получить всю необходимую  информацию о процессе <b>оформления сделок с недвижимостью</b>, <b>создание юридического лица</b> (ООО, ОА, фонды, инвестиционные фонды, капиталистические компании по недвижимости катирующиеся на бирже и др. ), <b>иммиграционные вопросы</b> иностранных граждан в Испании, <b>налогообложение</b> и требования к перечислению иностранного капитала в Испанию.</p>
                 <p>Вы можете сотрудничеть с нашим агенством по приемлемой для Вас схеме: <b>заказать поиск/ продажу объекта</b>, либо выбрать объект самостоятельно и обратиться к нам с вопросами оформления.</p>
                 <p>Риэлторское агенство "AlcisDom" находится <b>в центре города Барселоны</b>. Сотрудничает с агенствами в других странах, что дает возможность собственникам через одного риэлтора опубликовать свой объект в разных странах.</p>
             </div>
             <div class="col-md-5 about-img">
                 <img src="/images/about.jpg">
                 <p class="about-us-benefits"><i class="fa fa-check fa-lg fa-icon-benefits"></i> Сотрудники агенства владеют русским, испанским, каталонским, английским и французским языками.</p>
                 <p class="about-us-benefits"><i class="fa fa-check fa-lg fa-icon-benefits"></i> Все клиенты агенства получают юридическую поддержку при оформлении сделки.</p>
             </div>
         </div>
         <!--<div class="col-md-6">
             <div class="about-block">
                 <p>Сотрудники агенства владеют русским, испанским, каталонским, английским и французским языками.</p>
             </div>
         </div>
         <div class="col-md-6">
             <div class="about-block">
                <p>Все клиенты агенства получают юридическую поддержку при оформлении сделки.</p>
             </div>
         </div>
         <div class="col-md-12">
             <p>Вы можете сотрудничеть с нашим агенством по приемлемой для Вас схеме: заказать поиск/ продажу объекта, либо выбрать объект самостоятельно и обратиться к нам с вопросами оформления.</p>
             <p>Риэлторское агенство "AlcisDom" находится в центре города Барселоны. Сотрудничает с агенствами в других странах, что дает возможность собственникам через одного риэлтора опубликовать свой объект в разных странах.</p>
         </div>-->
     </div><!--row-->
</div>


<div class="container">


    <div class="properties-listing spacer"> <a href="buysalerent.html"  class="pull-right viewall">Посмотреть все</a>
        <h2 class="best-offers__title">Лучшие предложения</h2>
        <div id="owl-example" class="owl-carousel">
            <?php
                foreach($featured as $row):
            ?>

                    <div class="properties">
                        <div class="image-holder">
							<div class="item-thumb">
								<span class="label-featured label label-success">Выгодно</span>
								<div class="label-wrap label-right hide-on-list">
									<span class="label-status label-status-8 label label-default <?=($row['sold']) ? 'sold' : 'new' ?>"><?=\frontend\components\Common::getType($row) ?></span>
								</div>	
								<div class="price hide-on-list">
									<span class="item-price">€ <?=$row['price'] ?></span>
								</div>
								<a class="hover-effect" href="<?=Common::getUrlAdvert($row)?>">
									<img class="img-responsive attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>"  class="img-responsive" alt="properties"/>
								</a>
							</div>
                        </div>

                        <div class="item-body">
							<div class="body-left">
								<div class="info-row">
									<h3 class="property-title"><a href="<?=Common::getUrlAdvert($row) ?>">Красивый дом</a></h3>
									<div class="property-address"><?=$row['address'] ?></div>
								</div>
								<div class="table-list full-width info-row">
									<div class="cell">
										<div class="info-row amenities">
											<p><span>Спальни: <?=$row['bedroom'] ?></span><span>Ванн: <?=$row['bathrooms'] ?></span><span><?=$row['area'] ?> m2</span></p>
											<p>Дом</p>
										</div>
									</div>
									<div class="cell">
										<div class="phone">
											<a class="btn btn-primary" href="<?=Common::getUrlAdvert($row) ?>">Подробнее<i class="fa fa-angle-right fa-right"></i></a>
										</div>
									</div>
								</div>
							</div>
                        </div>
						<div class="item-foot date hide-on-list">
							<div class="item-foot-left"><p>В продаже</p></div>
							<div class="item-foot-right"><p><i class="fa fa-calendar"></i>1 месяц</p></div>
						</div>
                    </div>


            <?php
                endforeach;
            ?>
			
			
        </div>
    </div>

    </div>


