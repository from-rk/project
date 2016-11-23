<?php
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=\common\components\UserComponent::getUserImage(Yii::$app->user->id) ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?='Admin user: '?><?=Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'user', 'icon' => 'fa fa-dashboard', 'url' => ['/user']],
                    ['label' => 'Advert', 'icon' => 'fa fa-dashboard', 'url' => '/advert',
                        'items' => [
                            ['label' => 'All Advert', 'icon' => 'fa fa-file-code-o', 'url' => ['/advert'],],
                            ['label' => 'Add new', 'icon' => 'fa fa-dashboard', 'url' => ['/historia/create'],]
                        ]
                    ],
                    ['label' => 'Noticias', 'icon' => 'fa fa-dashboard', 'url' => '#',
                        'items' => [
                            ['label' => 'All Noticias', 'icon' => 'fa fa-file-code-o', 'url' => ['/noticia'],],
                            ['label' => 'Add new', 'icon' => 'fa fa-dashboard', 'url' => ['/noticia/create'],]
                        ]
                    ],
                    ['label' => 'blog', 'icon' => 'fa fa-file-code-o', 'url' => ['/blog']],
                    ['label' => 'blog1', 'icon' => 'fa fa-dashboard', 'url' => ['/blog1']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
