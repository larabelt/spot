## Installation

```
# install assets & migrate
php artisan belt-spot:publish
composer dumpautoload

# migrate & seed
php artisan migrate
php artisan db:seed --class=BeltSpotSeeder

# compile assets
gulp
```