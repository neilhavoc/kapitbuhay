<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliceManageAccountController extends Controller
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

        $database = $firestore->database();
        $userRef = $database->collection('police_accounts');
        $civilianUsers = $userRef->documents();

        $bucket = $storage->getBucket();


        $uuid = 'Uifd9atZiKSddBOvevvUaKQCMTM2';
        $brgyLogo = $bucket->object('police-accounts/'. $uuid .'/credentials/Police-Logo.png');
        $brgyIDFront = $bucket->object('police-accounts/'.$uuid.'/credentials/Police-Valid-ID-Front.png');
        $brgyIDBack = $bucket->object('police-accounts/'.$uuid.'/credentials/Police-Valid-ID-Back.png');

        $urlLogo = $brgyLogo->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $urlIDFront = $brgyIDFront->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $urlIDBack = $brgyIDBack->signedUrl(
            # This URL is valid for 15 minutes
            new \DateTime('15 min'),
            [
                'version' => 'v4',
            ]
        );

        $civilianUsers = $database->collection('police_accounts')->document($uuid);

        $civilianUsers->update([
                    ['path' => 'policeLogo', 'value' => $urlLogo],
                    ['path' => 'policeValidIDFront', 'value' => $urlIDFront],
                    ['path' => 'policeValidIDBack', 'value' => $urlIDBack]
                ]);

        $civilianUsers = $userRef->where('policeUID', '=', $uuid);
        $policeAcc = $civilianUsers->documents();
        return view('pages.police_manageaccounts', [
            'account' => $policeAcc,
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
