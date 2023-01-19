<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawReportsController extends Controller
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

            $incidentRefID = $database->collection('incident_reports');
            $incidentRef = $incidentRefID->documents();

            if (session('searchedtrue') != null)
            {
                $isSearched = session('searchedtrue');

                session(['searchedtrue' => null]);
            }
            else
            {
                $isSearched = 'empty';
            }

            return view('pages.vaw_incidents', [
                'incident' => $incidentRef,
                'brgyLogo' => $brgyUser,
                'isSearched' => $isSearched
            ]);
        }
    }

    public function displaySpecific(Request $request)
    {
        $isSearched = $request->input('sortby');
        session(['searchedtrue' => $isSearched]);

        return redirect('vaw_reports');
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
        session(['viewIncidentID' => $request->input('incidentID')]);

        return redirect('vaw_incidentreportview');
    }

    /**
     * DisplabrgyLogoy the specified resource.
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
