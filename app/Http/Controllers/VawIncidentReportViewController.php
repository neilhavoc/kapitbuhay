<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawIncidentReportViewController extends Controller
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

            $database = $firestore->database();
            $viewdisID = session('viewIncidentID');


            $incidentRef = $database->collection('incident_reports')->document($viewdisID);
            $incRef = $incidentRef->snapshot();

            return view('pages.vaw_incidentreportsview', [
                'incident' => $incRef,
                'brgyLogo' => $brgyUser,
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
