<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\version;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EventScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:deltaEvents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activate or deactivate events by date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // // activate event
        $today = Carbon::today()->toDateString();
        $start = Event::query()->select('starts_at')->whereDate('starts_at', $today)->where('visible', '=', 0)->update(['visible' => 1]);


        if ($start > 0) {
            version::where('id', 1)->increment('version');
        }


        // disable event
        // $yesterday = Carbon::yesterday();
        $yesterday = Carbon::yesterday()->toDateString();

        $end = DB::table('events')->select(DB::raw('DATE(ends_at) as end'))->where(DB::raw('DATE(ends_at)'), '<=', $yesterday)->where('visible', '=', 1)->delete();

        info($end);

        if ($end > 0) {
            version::where('id', 1)->increment('version');
        }
    }
}
