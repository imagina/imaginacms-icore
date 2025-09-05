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
];
