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
phpunit --coverage-html=public/tests/ohio/spot/base   -c vendor/ohiocms/spot/tests/base   --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/block  -c vendor/ohiocms/spot/tests/block  --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/address -c vendor/ohiocms/spot/tests/address --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/page   -c vendor/ohiocms/spot/tests/page   --bootstrap=bootstrap/autoload.php
phpunit --coverage-html=public/tests/ohio/spot/tag    -c vendor/ohiocms/spot/tests/tag    --bootstrap=bootstrap/autoload.php
```