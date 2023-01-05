<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawCreateReportController extends Controller
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

            $database = $firestore->database();
            $viewdisID = session('viewDistressID');
            $brgyUser = session('userID');

            $recordIDs = $database->collection('sos-distress-message')->document($viewdisID);
            $messageRef = $recordIDs->snapshot();

            $brgyUserIDRef = $database->collection('barangay_accounts')->document($brgyUser);
            $userRef = $brgyUserIDRef->snapshot();

            date_default_timezone_set('Asia/Singapore');
            $date = date('m/d/Y h:i:s a', time());

            if ($messageRef['status'] == 'Read')
            {
                return redirect('vaw_reviewdistressmessage');
            }
            else
            {
                return view('pages.vaw_createReports', [
                    'message'   => $messageRef,
                    'date'      => $date,
                    'brgyUser'  => $userRef
                ]);
            }
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
        $firestore = app('firebase.firestore');

        //store user details in firestore
        $database = $firestore->database();

        $brgyID = session('userID');
        $brgy = session('barangay');

        $incidentReportRef = $database->collection('record_IDs')->document('incidentReport_ID');
        $incidentRefID = $incidentReportRef->snapshot();

        if ($incidentRefID->exists())
        {
            $newIncidentID = $incidentRefID['id'] + 1;

            $incidentID_Records = $database->collection('record_IDs')->document('incidentReport_ID');
            $incidentID_Records->update([
                ['path' => 'id', 'value' => $newIncidentID]
            ]);
        }
        else
        {
            $data = [
                'id' => '100000',
            ];
            $newIncidentID = 100000;

            $database->collection('record_IDs')->document('incidentReport_ID')->set($data);
        }

        $senderUIDRef = $database->collection('sos-distress-message')->document($request->input('sosRefID'));
        $senderUID = $senderUIDRef->snapshot();

        $data = [
            'distressMessageRefID'      => $request->input('sosRefID'),
            'incidentReportID'          => $newIncidentID,
            'sender_FullName'           => $request->input('sender_Name'),
            'sender_UID'                => $senderUID['sender_userID'],
            'sendDate'                  => $request->input('sendDate'),
            'sender_location'           => $request->input('sender_loc'),
            'sender_locLink'            => $request->input('sender_locLink'),
            'distressMessageContent'    => $request->input('distressMessageContent'),
            'reportDetails'             => $request->input('reportDetails'),
            'reportTimeDate'            => $request->input('incidentReportDate'),
            'reportCreator'             => $request->input('reportCreator'),
            'reportCreatorID'           => $brgyID,
            'reportPosition'            => $request->input('position'),
            'barangay'                  => $brgy,
            'creatorType'               => 'barangay',
            'report_status'             => 'Ongoing',
        ];

        $database->collection('incident_reports')->document($newIncidentID)->set($data);

        return redirect('vaw_reports');
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
