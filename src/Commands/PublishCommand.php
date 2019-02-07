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
    protected $signature = 'belt-spot:publish {action=publish} {--force} {--include=} {--exclude=} {--config}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish assets for belt spot';

    protected $dirs = [
        'vendor/larabelt/spot/config' => 'config/belt',
        'vendor/larabelt/spot/database/factories' => 'database/factories',
        'vendor/larabelt/spot/database/migrations' => 'database/migrations',
        'vendor/larabelt/spot/database/seeds' => 'database/seeds',
        'vendor/larabelt/spot/docs' => 'resources/docs',
    ];

}