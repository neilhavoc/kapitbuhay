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
        $storage = app('firebase.storage');

        $bucket = $storage->getBucket();
        $database = $firestore->database();

        $viewMonitoringReportID = session('viewMonitoringReport');

        $phyMonID = session('monitoringID');

        $victimMonitoringRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('physicalhealth_monitoring')->document($phyMonID);
        $victimMonitoring = $victimMonitoringRef->snapshot();

        $brgyLogo1 = $bucket->object('civilian-users/' . $viewMonitoringReportID . '/monitoringdetails_images/day' . $victimMonitoring['monitoring_day'] . '/MonitoringImage1.png');

        $brgyLogo2 = $bucket->object('civilian-users/' . $viewMonitoringReportID . '/monitoringdetails_images/day' . $victimMonitoring['monitoring_day'] . '/MonitoringImage2.png');

        $brgyLogo3 = $bucket->object('civilian-users/' . $viewMonitoringReportID . '/monitoringdetails_images/day' . $victimMonitoring['monitoring_day'] . '/MonitoringImage3.png');

        $urlLogo1 = $brgyLogo1->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $urlLogo2 = $brgyLogo2->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $urlLogo3 = $brgyLogo3->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $brgyLogoRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('physicalhealth_monitoring')->document($victimMonitoringRef->id());

        $brgyLogoRef->update([
            ['path' => 'physicalmon_image1', 'value' => $urlLogo1],
            ['path' => 'physicalmon_image2', 'value' => $urlLogo2],
            ['path' => 'physicalmon_image3', 'value' => $urlLogo3]
        ]);

        $victimMonitoringRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('physicalhealth_monitoring')->document($phyMonID);
        $victimMonitoring = $victimMonitoringRef->snapshot();

        $questionsRef = $database->collection('monitoring_questions')->document('questions');
        $questions = $questionsRef->snapshot();

        $answersRef = $database->collection('monitoring_reports')->document($viewMonitoringReportID)->collection('mentalhealth_answers')->document($victimMonitoring['mentalhealth_id']);
        $answers = $answersRef->snapshot();

        return view('pages.vaw_EditHealthMonitoring', [
            'report'    => $victimMonitoring,
            'questions' => $questions,
            'answers'   => $answers
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
