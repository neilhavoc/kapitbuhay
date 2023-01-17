<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawUpdateHealthMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('userID') && !session()->has('brgyName')) {
            return redirect('loginpage');
        }
        else {
            $firestore = app('firebase.firestore');
            $storage = app('firebase.storage');

            $database = $firestore->database();
            $bucket = $storage->getBucket();

            $viewMonitoringReportID = session('viewMonitoringReport');

            $victimImage = $bucket->object('civilian-users/'. $viewMonitoringReportID .'/profile_picture/profile.jpg');

            $urlLogo = $victimImage->signedUrl(
                # This URL is valid for 15 minutes
                new \DateTime('15 min'),
                [
                    'version' => 'v4',
                ]
            );

            $civilianUsers = $database->collection('monitoring_reports')->document($viewMonitoringReportID);

            $civilianUsers->update([
                ['path' => 'victim_image', 'value' => $urlLogo],
            ]);

            $recordIDs = $database->collection('monitoring_reports')->document($viewMonitoringReportID);
            $monitorData = $recordIDs->snapshot();

            $victimMonitoringRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('physicalhealth_monitoring');
            $victimMonitoring = $victimMonitoringRef->documents();

            return view('pages.vaw_UpdateHealthMonitoring', [
                'monitor' => $monitorData,
                'report'  => $victimMonitoring
            ]);


        }
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
        session(['monitoringID' => $request->input('phyMonID')]);
        return redirect('vaw_edithealthmonitoring');
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
        $firestore = app('firebase.firestore');

        $database = $firestore->database();

        $recordIDs = $database->collection('monitoring_reports')->document($id);
        $recordIDs->update([
            ['path' => 'mentalhealth_form', 'value' => 'send'],
            ['path' => 'phyMon_ID', 'value' => $request->input('phyMonID')],
        ]);

        return redirect('vaw_updatehealthmonitoring');
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
