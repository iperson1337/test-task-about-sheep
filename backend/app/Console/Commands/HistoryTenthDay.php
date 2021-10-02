<?php

namespace App\Console\Commands;

use App\Models\Paddock;
use App\Models\Sheep;
use Illuminate\Console\Command;

class HistoryTenthDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:tenth_day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Десятый день';

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
        $paddocks = Paddock::with('sheep')->withCount('sheep')->having('sheep_count', '>', 1)->get();
        if ($paddocks->count() > 0) {
            $randomPaddock = $paddocks->random();
            if ($randomPaddock->sheep) $randomPaddock->sheep->random()->delete();
        }

        return 0;
    }
}
