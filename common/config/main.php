<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'modules' => [
      //  'filemanager' => [
      //      'class' => 'linchpinstudios\filemanager\Module',
//
      //  ],
        'blog' => [
            'class' => 'linchpinstudios\blog\Module',
        ],
        'blog1' => [
            'class' => 'pendalf89\blog\Module',
            // This option automatically translit entered titles
            // from russian symbols to english on fly. Default false.
            'autoTranslit' => true,
            // Some options for CKEditor. Default custom options.
            'editorOptions' => [],
            // callback function for create post view url. Have $model argument.
            'viewPostUrlCallback' => function($model) {
                return '/' . $model->alias;
            },
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            // Upload routes
            'routes' => [
                // Base absolute path to web directory
                'baseUrl' => '',
                // Base web directory url
                'basePath' => '@frontend/web',
                // Path for uploaded files in web directory
                'uploadPath' => 'uploads',
            ],
            // Thumbnails info
            'thumbs' => [
                'small' => [
                    'name' => 'Мелкий',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 'Средний',
                    'size' => [300, 200],
                ],
                'large' => [
                    'name' => 'Большой',
                    'size' => [500, 400],
                ],
            ],
        ],
    ],
    'components' => [

        'db' => require(dirname(__DIR__)."/config/db.php"),

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:sell-object|add-request|find|contact>' => 'main/main/<alias>',
                '<alias:service/search-real-estate>' => 'main/main/service-search-real-estate',
                '<alias:service/sale-real-estate>' => 'main/main/service-sale-real-estate',
                '<alias:service/support-real-estate-deal>' => 'main/main/service-support-real-estate-deal',
                '<alias:service/consult>' => 'main/main/service-consult',
                '<alias:service/creating-corporate-structure>' => 'main/main/service-creating-corporate-structure',
                '<alias:service/registration-nie>' => 'main/main/service-registration-nie',
                '<alias:service/immigration-issues-and-residence-registration>' => 'main/main/service-immigration-issues-and-residence-registration',
            ]
        ],
   /**     'request' => [
            'baseUrl' => ''
        ],*/
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
    ],
];
