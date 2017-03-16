<?php

namespace Belt\Spot\Commands;

use Belt\Core\Commands\PublishCommand as Command;

class PublishCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'belt-spot:publish {--force} {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish assets for belt spot';

    protected $dirs = [
        'vendor/larabelt/spot/config' => 'config/belt',
        'vendor/larabelt/spot/resources/js' => 'resources/belt/spot/js',
        'vendor/larabelt/spot/resources/sass' => 'resources/belt/spot/sass',
        'vendor/larabelt/spot/database/factories' => 'database/factories',
        'vendor/larabelt/spot/database/migrations' => 'database/migrations',
        'vendor/larabelt/spot/database/seeds' => 'database/seeds',
    ];

}