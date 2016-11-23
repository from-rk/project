<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="properties-listing spacer">

    <div class="row">
        <div class="col-lg-3 col-sm-4 ">
            <?=\yii\helpers\Html::beginForm(\yii\helpers\Url::to('/main/main/find/'),'get') ?>
            <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Поиск недвижимости в Испании</h4>

                <?php
                    $items=ArrayHelper::map($queryCity,'city', 'city');
                    echo Html::dropDownList('city','', $items
                        , ['class' => 'form-control', 'prompt' => 'Город']
                    );
                ?>

                <?=Html::dropDownList('price', $request->get('price'),[
                            '50000-150000' => '€50,000 - €150,000',
                            '150000-250000' => '€150,000 - €250,000',
                            '250000-350000' => '€250,000 - €350,000',
                            '300000' =>'от €300,000',
                        ],['class' => 'form-control', 'prompt' => 'Цена']) ?>

                <?=Html::dropDownList('type', $request->get('type'),[
                            '0'=>'Жилая',
                            '1'=> 'Коммерческая',
                        ],['class' => 'form-control', 'prompt' => 'Тип недвижимости']) ?>



                <button class="btn btn-primary btn-search">Поиск</button>
                <?=\yii\helpers\Html::endForm() ?>

            </div>



            <div class="hot-properties hidden-xs">

                <? echo \frontend\widgets\HotWidget::widget() ?>

            </div>


        </div>

        <div class="col-lg-9 col-sm-8">
            <div class="row">

                <?php
                foreach($model as $row):
                    $url = \frontend\components\Common::getUrlAdvert($row);
                    ?>
                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?>"  class="img-responsive" alt="properties">
                                <div class="status <?=($row['sold']) ? 'sold' : 'new' ?>"><?=\frontend\components\Common::getType($row) ?></div>
                            </div>
                            <h4><a href="<?=$url ?>" ><?=\frontend\components\Common::getTitleAdvert($row) ?></a></h4>
                            <p class="city"> <?=$row['city'] ?></p>
                            <p class="price"><b> €<?=$row['price'] ?></b></p>
                            <a class="btn btn-primary" href="<?=$url ?>" >Подробнее</a>
                        </div>
                    </div>

                    <?php
                endforeach;
                ?>
                <!-- properties -->


                <div class="clearfix"></div>
                <!-- properties -->
                <div class="center">
                    <?php echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>