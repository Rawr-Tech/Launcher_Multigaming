<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StopDockerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Stops Laradock's containers";

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
        return shell_exec("cd laradock/ && docker-compose stop nginx php-fpm mariadb beanstalkd redis workspace php-worker");
    }
}
