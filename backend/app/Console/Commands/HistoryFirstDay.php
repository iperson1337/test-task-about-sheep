<?php

namespace App\Console\Commands;

use App\Models\Paddock;
use App\Models\Sheep;
use Illuminate\Console\Command;

class HistoryFirstDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:first_day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Первый день';

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
        $paddocks = Paddock::factory()->count(4)->create();

        $paddocks->map(function ($paddock) {
            $paddock->sheep_count = 1;
        });

        $allSheepCount = 10 - $paddocks->sum('sheep_count');

        while ($allSheepCount > 0) {
            $paddock = $paddocks->random();
            $paddock->sheep_count +=  1;
            $allSheepCount -= 1;
        }

        foreach ($paddocks as $paddock) {
            $paddock->sheep()->createMany(Sheep::factory()->count($paddock->sheep_count)->make()->toArray());
        }
        return 0;
    }
}
