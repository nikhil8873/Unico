<?php

namespace App\Console\Commands;

use App\Services\GoogleDriveService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        // $gDrive = new GoogleDriveService();

        $dbhost = env('DB_HOST');
        $dbport = env('DB_PORT');
        $dbuser = env('DB_USERNAME');
        $dbpass =  env('DB_PASSWORD');
        $dbname =  env('DB_DATABASE');

        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
        $path =  storage_path() . "/app/backup/".$filename;


        $command = "".env('DUMP_PATH')." --user=" . $dbuser  . " --password=" . $dbpass . " --host=" . $dbhost . " ". " --port=" . $dbport . " " . $dbname . "  > " . $path;

        $returnVar = NULL;
        $output = NULL;


        exec($command, $output, $returnVar);

        \Storage::disk('google')->put($filename, file_get_contents($path));

        return Command::SUCCESS;
    }
}
