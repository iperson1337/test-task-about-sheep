<?php

namespace App\Console\Commands;

use App\Models\History;
use Illuminate\Console\Command;

class HistoryStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Начать историю';

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
        $latestHistory = History::latest()->first();
        $lastDay = $latestHistory ? $latestHistory->id + 1 : 1;

        History::create(['day' => $lastDay]);
        return 0;
    }
}
