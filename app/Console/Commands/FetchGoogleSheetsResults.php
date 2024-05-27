<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GoogleDocsController;

class FetchGoogleSheetsResults extends Command
{
    protected $signature = 'google-sheets:fetch-results';
    protected $description = 'Fetch results from Google Sheets';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new GoogleDocsController();
        $controller->fetchResults();
        $this->info('Results fetched successfully');
    }
}
