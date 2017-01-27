<?php

namespace Ohio\Spot\Base\Commands;

use Ohio\Core\Base\Commands\PublishCommand as Command;

class PublishCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ohio-spot:publish {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish assets for ohio spot';

    protected $dirs = [
        'vendor/ohiocms/spot/config' => 'config/ohio',
        'vendor/ohiocms/spot/resources' => 'resources/ohio/spot',
        'vendor/ohiocms/spot/database/factories' => 'database/factories',
        'vendor/ohiocms/spot/database/migrations' => 'database/migrations',
        'vendor/ohiocms/spot/database/seeds' => 'database/seeds',
    ];

}