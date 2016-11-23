<?php
    use yii\bootstrap\Nav;
?>

<!-- Header Starts -->

    <div class="top-menu">
        <div class="container">
			<div class="api">
				<p><span>API</span> 7107</p>
			</div>
                <?php
                    $menuItems = [
                        ['label' => "<span><i class=\"fa fa-plus-square-o\"></i> объект</span>", 'url' => '/sell-object', 'options' => ['class' => 'addanuncio']],
                        ['label' => "<span><i class=\"fa fa-plus-square-o\"></i> запрос на недвижимость</span>", 'url' => '/add-request', 'options' => ['class' => 'addanuncio']],
                        ['label' => "<span>условия работы</span>", 'url' => '#', 'options' => ['class' => 'addanuncio']],
                    ];
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $menuItems,
                        'encodeLabels' => false,
                    ]);
                    ?>
        </div>
            <!-- #Nav Ends -->

    </div>
<!-- #Header Starts -->

<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">


            <div class="header">
                <a href="/" class="logo">
					<img src="/images/logobig.png"  alt="Агенство недвижимости в Барселоне" height="77">
					<p>real estate</p>
				</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <?php
                    $menuItems = [
                        ['label' => 'Главная', 'url' => '/'],
                        ['label' => 'Поиск', 'url' => '/find'],
                        ['label' => 'Услуги', 'url' => '#', 'items' => [
                            ['label' => 'Поиск недвижимости', 'url' => ['/service/search-real-estate']],
                            ['label' => 'Продажа недвижимости', 'url' => ['/service/sale-real-estate']],
                            ['label' => 'Сопровождение сделки адвокатом', 'url' => ['/service/support-real-estate-deal']],
                            ['label' => 'Консультирование', 'url' => ['/service/consult']],
                            ['label' => 'Создание корпоративной структуры', 'url' => ['/service/creating-corporate-structure']],
                            ['label' => 'Регистрация НИЕ', 'url' => ['/service/registration-nie']],
                            ['label' => 'Оформление резиденции', 'url' => ['/service/immigration-issues-and-residence-registration']],
                        ]],
                        ['label' => 'Рубрика', 'url' => '#', 'items' => [
                            ['label' => 'Барселона', 'url' => ['#']],
                            ['label' => 'Новости недвижимости', 'url' => ['#']],
                        ]],
                        ['label' => 'Связаться', 'url' => '/contact'],
                    ];
                    echo Nav::widget([
                        'options' => ['class' => 'pull-right'],
                        'items' => $menuItems,
                    ]);
                    ?>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>