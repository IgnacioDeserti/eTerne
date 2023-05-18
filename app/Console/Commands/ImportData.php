<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Revolution\Google\Sheets\Facades\Sheets;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = Sheets::spreadsheet(config('sheets.hay que poner el id de la hoja de calculo'))
            ->sheet('Productos')
            ->all();

        dd($data);

        /* foreach($data as $product){

        } */
    }
}
