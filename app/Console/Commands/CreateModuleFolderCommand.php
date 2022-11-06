<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateModuleFolderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $folders = [
            'Http/Controllers',
            'Http/Middleware',
            'Http/Requests',
            'Http/Resource',
            'Models',
            'UseCase',
            'Traits',
            'Services'
        ];

        $name = $this->argument('name');

    }
}
