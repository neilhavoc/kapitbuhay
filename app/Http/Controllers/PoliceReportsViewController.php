<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliceReportsViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!session()->has('userID') && !session()->has('brgyName')) {
            return redirect('loginpage');
        }
        else {
            $firestore = app('firebase.firestore');
            $database = $firestore->database();

            /*
            $storage = app('firebase.storage');
            $bucket = $storage->getBucket();
            $userid = session('userID');
            $brgyLogo = $bucket->object('barangay-vaw/'. $userid .'/credentials/Barangay-Logo.png');

            $urlLogo = $brgyLogo->signedUrl(
                # This URL is valid for 15 minutes
                new \DateTime('15 min'),
                [
                    'version' => 'v4',
                ]
            );
            $brgyLogoRef = $database->collection('barangay_accounts')->document($userid);

            $brgyLogoRef->update([
                ['path' => 'brgyLogo', 'value' => $urlLogo]
            ]);

            $brgyUserIDRef = $database->collection('barangay_accounts')->document($userid);
            $brgyUser = $brgyUserIDRef->snapshot();
            */
            $viewdisID = session('viewIncidentID');
            $incidentRef = $database->collection('incident_reports')->document($viewdisID);
            $incRef = $incidentRef->snapshot();

            $userid = session('userID');
            $policeRef = $database->collection('police_accounts')->document($userid);
            $policeID = $policeRef->snapshot();


            return view('pages.police_reportsview', [
                'incident' => $incRef,
                'police'   => $policeID
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
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $incidentRef = $database->collection('incident_reports')->document($id);

        $incidentRef->update([
            ['path' => 'report_status', 'value' => $request->input('CaseStatus')]
        ]);

        if ($request->input('CaseStatus')  == "Closed")
        {
            $incidentReportRef = $database->collection('incident_reports')->document($id);
            $userIDRef = $incidentReportRef->snapshot();

            $victimUsersRef = $database->collection('civilian-users')->document($userIDRef['sender_UID']);
            $userRef = $victimUsersRef->snapshot();

            $data = [
                'victimUserID'      => $userIDRef['sender_UID'],
                'victimFullName'    => $userRef['fName'] . ' ' . $userRef['midName'] . ' ' . $userRef['lName'],
                'victimAddress'     => $userRef['street'] . ', ' . $userRef['barangay'] . ', ' . $userRef['city'],
                'victimPhoneNum'    => '0' . $userRef['phonenumber'],
                'monitoring_status' => 'Not Yet Monitored',
                'victim_image'      => 'empty'
            ];

            $monitoringRef = $database->collection('monitoring_reports')->document($userIDRef['sender_UID'])->set($data);
        }

        return redirect('police_report');
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
