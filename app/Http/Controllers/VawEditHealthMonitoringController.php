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

        $phyMonID = session('monitoringID');
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
