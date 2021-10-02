<?php

namespace App\Console\Commands;

use App\Models\Paddock;
use Illuminate\Console\Command;

class SheepTransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sheep:transfer';

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
        $paddocks = Paddock::withCount('sheep')->orderBy('sheep_count', 'desc')->get();
        $greatestPaddock = $paddocks->first(function ($value, $key) use ($paddocks) {
            $index = $paddocks->count()-1 > $key ? $key+1: $key;
            $next = $paddocks[$index];
            if ($next && ($value->sheep_count - $next->sheep_count) === 1) {
                return true;
            } else {
                return false;
            }
        });
        if ($greatestPaddock) {
            $greatestPaddock->sheep()->create();
        }

        $transferSheep = $paddocks->first()->sheep()->latest()->first();
        $aloneSheepPaddock = Paddock::withCount('sheep')->having('sheep_count', 1)->first();
        if ($aloneSheepPaddock && $transferSheep) {
            $transferSheep->update([
                'paddock_id' =>  $aloneSheepPaddock->id,
            ]);
        }


        return 0;
    }
}
