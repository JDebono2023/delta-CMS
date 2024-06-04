<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Fetch the analytics data from the API.
     *
     * @return \Illuminate\Http\Response
     */
    public function analyticsdata()
    {
        return Analytic::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Analytic::create([

            'page_id' => $request->page_id,
            'action_id' => $request->action_id,

        ]);
    }


    public function viewPDF(Request $request)
    {
        $data = $request->chartData;

        // dd($data);
        // $pdf = App::make('dompdf.wrapper');
        $pdf = Pdf::loadView('analyticspdf', ['data' => $data]);

        return $pdf->stream();
    }

    public function downloadPDF(Request $request)
    {
        $date = date('Y-m-d');
        $data = $request->chartData;

        $pdf = Pdf::loadView('analyticspdf', compact('data'));
        return $pdf->download($date . '_DeltaAnalytics.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
