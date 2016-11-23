<?php
    use common\models\Advert;
    use common\models\LoginForm;
    use frontend\filters\FilterAdvert;
    use frontend\models\ContactForm;
    use frontend\models\Image;
    use frontend\models\SignupForm;
    use yii\base\DynamicModel;
    use yii\web\Response;
    use yii\widgets\ActiveForm;
    use yii\db\ActiveRecord;
?>
<div class="body-detail-property">
<div class="container detail-property">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
			<div class="head-detail col-lg-8 col-sm-8">
				<div class="header-left">
					<h2><?=\frontend\components\Common::getTitleAdvert($model) ?><span class="label-wrap"><span class="label label-primary label-status-8"><?=\frontend\components\Common::getType($model) ?></span></span></h2>
					<div class="property-address"><?=$model['address'] ?></div>
				</div>
				<div class="header-right">
					<h2 class="item-price">€ <?=$model['price'] ?></h2>
				</div>
			</div>
			<div class="row">
                <div class="col-lg-8 left-col">
                    <div class="property-images">
                        <!-- Slider Starts -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <?php
                                foreach(range(1,count($images) - 1) as $s):
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?=$s ?>" class=""></li>
                                <?php
                                endforeach;
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <!-- Item 1 -->

                                <div class="item active">
                                    <img src="<?=\frontend\components\Common::getImageAdvert($model)[0] ?>"  class="properties" alt="properties" />
                                </div>
                                <?php
                                foreach($images as $image):
                                    ?>
                                    <div class="item">
                                        <img src="<?=$image ?>"  class="properties" alt="properties" />
                                    </div>
                                <?php
                                endforeach
                                ?>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <!-- #Slider Ends -->

                    </div>

					<div class="property-description detail-block target-block">
						<div class="detail-title">
							<h3 class="title-left">Описание</h3>
						</div>
						<p><?= $model->description ?></p>
					</div>
					
					<div class="detail-block details target-block">
						<div class="detail-title">
							<h3 class="title-left">Детали</h3>
						</div>
						<div class="col-lg-4">
							<p><span>Спальни: </span><?=$model['bedroom'] ?></p>
						</div>
						<div class="col-lg-4">
							<p><span>Ванн: </span><?=$model['bathrooms'] ?></p>
						</div>
						<div class="col-lg-4">
							<p><?=$model['area'] ?><span> m2</span></p>
						</div>
					</div>
					
					<div class="detail-block address-block target-block">
						<div class="detail-title">
							<h3 class="title-left">Адрес</h3>
						</div>
						<div class="detail-col">
							<div class="col-lg-6">
								<p><span>Страна:</span></p>
							</div>
							<div class="col-lg-6">
								<p><span>Город: </span><?=$model['address'] ?></p>
							</div>
						</div>	
						<div class="detail-map">
							<?php echo $map->display(); ?>
						</div>
					</div>
					
                </div>
                <div class="col-lg-4 right-col">
					<div class="col-lg-12 col-sm-6 inner-right-col">
						<div class="contact-form">
							<div class="enquiry">
								<h3>Связаться с нами</h3>
								<p>Если Вас заинтересовало предложение, то свяжитесь с нами по телефону или через контактую форму ниже</p>
								<p class="phone-number"><i class="fa fa-phone"></i>(+34) 934 122 384</p>
								<?php
								$form = \yii\bootstrap\ActiveForm::begin();
								?>
								<?php echo $form->field($model_feedback,'email')->textInput(['value' => $current_user['email'], 'placeholder' => 'you@yourdomain.com'])->label(false) ?>
								<?php echo $form->field($model_feedback,'name')->textInput(['value' => $current_user['username'], 'placeholder' => 'Username'])->label(false) ?>
								<?php echo $form->field($model_feedback,'name')->textInput(['value' => $current_user['username'], 'placeholder' => 'Username'])->label(false) ?>
								<?php echo $form->field($model_feedback,'text')->textarea(['rows' => 6, 'placeholder' => 'Whats on your mind?'])->label(false) ?>
								<button type="submit" class="btn btn-primary" name="Submit">Отправить</button>

								<?php
								\yii\bootstrap\ActiveForm::end();
								?>

							</div>
						</div>
					</div>
					<div class="col-lg-12 col-sm-6 inner-right-col">
						<div class="enquiry">
							<?php echo \frontend\widgets\HotWidget::widget() ?>
						</div>
					</div>
					
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>