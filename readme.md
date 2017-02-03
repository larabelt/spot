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