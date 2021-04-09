<?php
namespace App\Console\Commands;

use App\Jobs\MovieJob;
use App\Jobs\GenreJob;
use Illuminate\Console\Command;

class MovieCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Movie:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for calling Movies API';

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
     * @return int
     */
    public function handle()
    {
        dispatch(new MovieJob());
        dispatch(new GenreJob());
        \Log::info("Movie Cron execution!");
        $this->info('Movie:Cron Command is working fine!');
    }
}
