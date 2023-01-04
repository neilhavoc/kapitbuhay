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

            return view('pages.vaw_UpdateHealthMonitoring', [
                'monitor' => $monitorData,
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
