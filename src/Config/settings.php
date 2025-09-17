<?php

return [
  'recaptchaSiteKey' => [
    'name' => 'icore::recaptchaSiteKey',
    'default' => null,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.recaptchaSiteKey',
      ]
    ]
  ],
  'recaptchaSecretKey' => [
    'name' => 'icore::recaptchaSecretKey',
    'default' => null,
    'private' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.recaptchaSecretKey',
      ]
    ]
  ],

  'siteName' => [
    'name' => 'icore::site-name',
    'default' => 'My Site',
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.site-name'
      ]
    ]
  ],
  'siteNameMini' => [
    'name' => 'icore::site-name-mini',
    'default' => 'my site',
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.site-name-mini'
      ],
    ]
  ],
  'siteDescription' => [
    'name' => 'icore::site-description',
    'default' => 'This is my site description',
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12',
      'props' => [
        'label' => 'icore::core.settings.site-description',
        'type' => 'textarea',
        'rows' => 3,
      ],
    ]
  ],
  'defaultLocale' => [
    'name' => 'icore::defaultLocale',
    'default' => env('APP_LOCALE', 'es'),
    'dynamicField' => [
      'type' => 'input',
      'props' => [
        'label' => 'icore::core.settings.defaultLocales'
      ],
    ]
  ],
  'locales' => [
    'name' => 'icore::locales',
    'default' => ['es'],
    'dynamicField' => [
      'type' => 'treeSelect',
      "onlySuperAdmin" => true,
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.locales',
        'multiple' => true,
        'sortdefaultBy' => 'ORDER_SELECTED'
      ],
      'loadOptions' => [
        'apiRoute' => 'apiRoutes.qsite.siteSettings',
        'select' => ['label' => 'name', 'id' => 'iso'],
        'requestParams' => ['filter' => ['settingGroupName' => 'availableLocales']]
      ]
    ]
  ],

  'logo1' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::logo1',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.logo1',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],

  'logo2' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::logo2',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.logo2',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logo3' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::logo3',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.logo3',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logoIadmin' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::logoIadmin',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.logoIadmin',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logoIadminSM' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::logoIadminSM',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.logoIadminSM',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'favicon' => [
    'default' => (object)['mainimage' => null],
    'name' => 'icore::favicon',
    'isMedia' => 'medias_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'icore::core.settings.groups.media.title',
      'props' => [
        'label' => 'icore::core.settings.favicon',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  //Colors
  'brandPrimary' => [
    'name' => 'icore::brandPrimary',
    'default' => '#027be3',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.brandPrimary'
      ]
    ]
  ],
  'primaryContrast' => [
    'name' => 'icore::primaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.primaryContrast'
      ]
    ]
  ],
  'brandSecondary' => [
    'name' => 'icore::brandSecondary',
    'default' => '#26a69a',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.brandSecondary'
      ]
    ]
  ],
  'secondaryContrast' => [
    'name' => 'icore::secondaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.secondaryContrast'
      ]
    ]
  ],
  'brandTertiary' => [
    'name' => 'icore::brandTertiary',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.brandTertiary'
      ]
    ]
  ],
  'tertiaryContrast' => [
    'name' => 'icore::tertiaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.tertiaryContrast'
      ]
    ]
  ],
  'brandQuaternary' => [
    'name' => 'icore::brandQuaternary',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.brandQuaternary'
      ]
    ]
  ],
  'quaternaryContrast' => [
    'name' => 'icore::quaternaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'icore::core.settings.quaternaryContrast'
      ]
    ]
  ],
  'brandAddressBar' => [
    'name' => 'icore::brandAddressBar',
    'default' => '#027be3',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.addressBar'
      ]
    ]
  ],
  'brandAccent' => [
    'name' => 'icore::brandAccent',
    'default' => '#9c27b0',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandAccent'
      ]
    ]
  ],
  'brandPositive' => [
    'default' => '#21ba45',
    'name' => 'icore::brandPositive',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandPositive'
      ]
    ]
  ],
  'brandNegative' => [
    'default' => '#c10015',
    'name' => 'icore::brandNegative',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandNegative'
      ]
    ]
  ],
  'brandInfo' => [
    'default' => '#31ccec',
    'name' => 'icore::brandInfo',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandInfo'
      ]
    ]
  ],
  'brandWarning' => [
    'default' => '#f2c037',
    'name' => 'icore::brandWarning',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandWarning'
      ]
    ]
  ],
  'brandDark' => [
    'default' => '#1d1d1d',
    'name' => 'icore::brandDark',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'icore::core.settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'icore::core.settings.brandDark'
      ]
    ]
  ],

//
//  'iadminTheme' => [
//    'name' => 'icore::iadminTheme',
//    'default' => '1',
//    'dynamicField' => [
//      'type' => 'select',
//      'props' => [
//        'label' => 'icore::core.settings.cms.iadminTheme.title',
//        'options' => [
//          ['label' => 'icore::core.settings.cms.iadminTheme.theme1', 'value' => '1'],
//          ['label' => 'icore::core.settings.cms.iadminTheme.theme2', 'value' => '2'],
//        ]
//      ]
//    ]
//  ],
//  'showGoToSiteButton' => [
//    'name' => 'icore::showGoToSiteButton',
//    'default' => '1',
//    'dynamicField' => [
//      'type' => 'select',
//      'props' => [
//        'label' => 'icore::core.settings.cms.showGoToSiteButton',
//        'options' => [
//          ['label' => 'icore::core.yes', 'value' => '1'],
//          ['label' => 'icore::core.no', 'value' => '0'],
//        ]
//      ],
//    ]
//  ],
//  'offline' => [
//    'name' => 'icore::offline',
//    'default' => '0',
//    'dynamicField' => [
//      'type' => 'select',
//      'groupName' => 'cms',
//      'groupTitle' => 'icore::core.settingGroups.cms',
//      'props' => [
//        'label' => 'icore::core.settings.cms.offline',
//        'options' => [
//          ['label' => 'icore::core.yes', 'value' => '1'],
//          ['label' => 'icore::core.no', 'value' => '0'],
//        ]
//      ]
//    ]
//  ],
//  'enableDynamicFieldsCache' => [
//    'name' => 'icore::enableDynamicFieldsCache',
//    'default' => "0",
//    'dynamicField' => [
//      'type' => 'checkbox',
//      'props' => [
//        'label' => 'icore::core.settings.enableDynamicFieldsCache',
//        'trueValue' => "1",
//        'falseValue' => "0",
//      ]
//    ]
//  ],

];
