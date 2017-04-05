<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartDockerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:start {--migrate} {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Starts Laradock's containers";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $opts = $this->options();

        if ($opts['migrate'] || $opts['refresh']) {
            $txt = ($opts['migrate']) ? 'migrate' : 'refresh';
            shell_exec("cd laradock/ && docker-compose up -d nginx php-fpm mariadb beanstalkd redis");
            $this->info("Trying to $txt the database...");
            shell_exec("cd laradock/ && docker-compose exec workspace bash -c 'php artisan migrate:refresh --seed'");
            $this->info('Done');
            return true;
        } else {
            return shell_exec("cd laradock/ && docker-compose stop nginx php-fpm mariadb beanstalkd redis");
        }
    }
}
