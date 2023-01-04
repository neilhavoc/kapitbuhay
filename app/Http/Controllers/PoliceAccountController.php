<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Http\Helpers\FirebaseHelper;

class PoliceAccountController extends Controller
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

        foreach($civilianUsers as $uid)
        {
            $uuid = $uid['policeUID'];
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
        };

        $civilianUsers = $userRef->documents();
        return view('pages.manage_PoliceAccounts', [
            'account' => $civilianUsers,
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
        session(['viewPoliceID' => $request->input('policeID')]);

        return redirect('manage_accountspoliceprofileview');
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

        $civilianUsers = $database->collection('police_accounts')->document($id);
        $civilianUsers->update([
                    ['path' => 'verification_status', 'value' => $request->input('verification')],
                    ['path' => 'account_status', 'value' => $request->input('accountStatus')]
                ]);
        return redirect('policeAcc');
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
