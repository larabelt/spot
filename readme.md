## Installation

```
# install assets & migrate
php artisan ohio-spot:publish
composer dumpautoload

# migrate & seed
php artisan migrate
php artisan db:seed --class=OhioSpotSeeder

# compile assets
gulp
```

## Misc

```
# unit testing
phpunit -c ../spot/tests --bootstrap=bootstrap/app.php

phpunit --coverage-html=public/tests/ohio/spot/base    -c vendor/ohiocms/spot/tests/base    --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/address -c vendor/ohiocms/spot/tests/address --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/place   -c vendor/ohiocms/spot/tests/place   --bootstrap=bootstrap/autoload.php
```