<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawEditHealthMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firestore = app('firebase.firestore');

        $database = $firestore->database();

        $victimUID = session('viewMonitoringReport');

        $viewMonitoringReportID = session('viewMonitoringReport');

        //getting number of days
        $phymonRef = $database->collection('record_IDs')->document($victimUID . 'physicalReport_IDs');
        $physicalmonitoringID = $phymonRef->snapshot();

        if ($physicalmonitoringID->exists())
        {
            $day = $physicalmonitoringID['day'] + 1;
        }
        else
        {
            $day = 1;
        }

        $phyMonID = session('monitoringID');
        $victimMonitoringRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('physicalhealth_monitoring')->document($phyMonID);
        $victimMonitoring = $victimMonitoringRef->snapshot();

        return view('pages.vaw_EditHealthMonitoring', [
            'day'    => $day,
            'report' => $victimMonitoring
        ]);
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
        //
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
