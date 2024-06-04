<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Analytic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class Analytics extends Component
{
    public $allAnalytics;

    //  processing data for viewing ONLY
    // for api controls see Analytics Controller
    // page_id codes
    // ----------------------------------------
    // main nav - all pages
    // 1 - home
    // 2 - events
    // 3 - attractions
    // 4 - menus
    // 5 - auto return to home page
    // 6 - eyelook info modal

    // ----------------------------------------------------------
    // home page actions
    // 11 - more events nav to events page
    // 121 - lower level map
    // 122 - main level map
    // 123 - second level map
    // 124 - 20th floor map

    // ----------------------------------------------------------
    // attractions page actions
    // 31 - family freindly category
    // 32 - entertainment category
    // 33 - outdoors category

    // ----------------------------------------------------------
    // menu page actions
    // 41 - brunch menu button
    // 42 - breakfast menu button
    // 43 - dinner menu button
    // 44 - drink menu button


    public function render()
    {
        $this->allAnalytics = Analytic::all();
        // dd($this->allAnalytics);

        // 1. TOTAL ACTIVITY  TO DATE//---------------------------------------------------------------------------
        $totalActivity = DB::table('analytics')->select(DB::raw('count(*) as totalActivity'))->get();

        //2. MONTHLY - TOTAL ACTIVITY //---------------------------------------------------------------------------
        $month01K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '01')->get();
        $month02K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '02')->get();
        $month03K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '03')->get();
        $month04K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '04')->get();
        $month05K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '05')->get();
        $month06K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '06')->get();
        $month07K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '07')->get();
        $month08K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '08')->get();
        $month09K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '09')->get();
        $month10K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '10')->get();
        $month11K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '11')->get();
        $month12K = DB::table('analytics')->select(DB::raw('count(*) as count'))->whereMonth('created_at', '12')->get();

        $month = collect([$month01K, $month02K, $month03K, $month04K, $month05K, $month06K, $month07K, $month08K, $month09K, $month10K, $month11K, $month12K]);
        // dd($month);



        // 3. DAY OF WEEK - TOTAL ACTIVITY //---------------------------------------------------------------------------
        // summary of use per day

        $mon = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '0')->get();
        $tue = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '1')->get();
        $wed = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '2')->get();
        $thu = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '3')->get();
        $fri = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '4')->get();
        $sat = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '5')->get();
        $sun = DB::table('analytics')->select(DB::raw('count(*) as count'))->where(DB::raw('WEEKDAY(created_at)'), '=', '6')->get();

        $day = collect([$mon, $tue, $wed, $thu, $fri, $sat, $sun]);
        // dd($day);

        //4. HOURLY //---------------------------------------------------------------------------
        //TOTAL ACTIVITY DURING OPERATING HOURS  - summary of use per hour, by redirect return to home
        // $hour = Analytic::select(DB::raw('HOUR(created_at) as time'), DB::raw('COUNT(*) as total'))->where('page_id', '=', '5')->groupBy('time')->orderBy('time', 'ASC')->get();
        // // dd($hour);

        $mid = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '0')->get();
        $one = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '1')->get();
        $two = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '2')->get();
        $thr = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '3')->get();
        $fou = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '4')->get();
        $fiv = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '5')->get();
        $six = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '6')->get();
        $sev = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '7')->get();
        $eig = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '8')->get();
        $nin = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '9')->get();
        $ten = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '10')->get();
        $ele = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '5')->get();
        $noon = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '12')->get();

        $oneP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '13')->get();
        $twoP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '14')->get();
        $thrP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '15')->get();
        $fouP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '16')->get();
        $fivP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '17')->get();
        $sixP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '18')->get();
        $sevP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '19')->get();
        $eigP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '20')->get();
        $ninP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '21')->get();
        $tenP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '22')->get();
        $eleP = DB::table('analytics')->select(DB::raw('COUNT(*) as total'))->where(DB::raw('HOUR(created_at)'), '=', '23')->get();

        $hour = collect([$mid, $one, $two, $thr, $fou, $fiv, $six, $sev, $eig, $nin, $ten, $ele, $noon, $oneP, $twoP, $thrP, $fouP, $fivP, $sixP, $sevP, $eigP, $ninP, $tenP, $eleP]);


        // dd($hour);

        // 5. TOTAL PAGES ACTIVITY //---------------------------------------------------------------------------
        //  overall totals
        $home = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('page_id', '=', '1')->get();
        $events = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('page_id', '=', '2')->get();
        $attractions = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('page_id', '=', '3')->get();
        $menus = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('page_id', '=', '4')->get();

        $page = collect([$home, $events, $attractions, $menus]);
        // dd($page);


        // 6. HOME PAGE ACTIVITY //---------------------------------------------------------------------------
        //  overall totals

        $eventNav = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('action_id', '=', '11')->get();
        $lowerMap = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('action_id', '=', '121')->get();
        $mainMap = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('action_id', '=', '122')->get();
        $secondMap = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('action_id', '=', '123')->get();
        $twentyMap = DB::table('analytics')->select(DB::raw('COUNT(*) as count'))->where('action_id', '=', '124')->get();

        $home = collect([$eventNav, $lowerMap, $mainMap, $secondMap, $twentyMap]);
        // dd($home);

        // 7. ATTRACTIONS PAGE ACTIVITY //---------------------------------------------------------------------------
        //  overall totals

        $family = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '31')->groupBy('action_id')->get();
        $entertainment = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '32')->groupBy('action_id')->get();
        $outdoors = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '33')->groupBy('action_id')->get();

        $category = collect([$family, $entertainment, $outdoors]);
        // dd($category);

        // 8. MENU PAGE ACTIVITY //---------------------------------------------------------------------------
        //  overall totals
        $brunch = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '41')->groupBy('action_id')->get();
        $breakfast = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '42')->groupBy('action_id')->get();
        $dinner = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '43')->groupBy('action_id')->get();
        $drinks = Analytic::select('action_id', DB::raw('COUNT(*) as count'))->where('action_id', '=', '44')->groupBy('action_id')->get();

        $menu = collect([$brunch, $breakfast, $dinner, $drinks]);
        // dd($category);

        // 9. EYELOOK MODAL //---------------------------------------------------------------------------
        //  overall totals
        $elm = Analytic::select('page_id', DB::raw('COUNT(*) as count'))->where('page_id', '=', '6')->groupBy('page_id')->get();
        // dd($elm);


        return view('livewire.analytics', ['analytics' => $this->allAnalytics, 'totalActivity' => $totalActivity, 'month' => $month, 'day' => $day, 'hour' => $hour, 'page' => $page, 'home' => $home, 'category' => $category, 'menu' => $menu, 'elm' => $elm]);
    }
}