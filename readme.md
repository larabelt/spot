## Installation

Add the ServiceProvider to the providers array in config/app.php

```php
Belt\Spot\BeltSpotServiceProvider::class,
```

```
# publish
php artisan belt-spot:publish
composer dumpautoload

# migration
php artisan migrate

# seed
php artisan db:seed --class=BeltSpotSeeder

# compile assets
npm run
```