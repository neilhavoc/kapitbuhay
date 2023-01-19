<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurokAccountController extends Controller
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
            $bucket = $storage->getBucket();

            $userid = session('userID');
            $brgyLogo = $bucket->object('purok-leader/'. $userid .'/credentials/Purok-Logo.png');

            $urlLogo = $brgyLogo->signedUrl(
                # This URL is valid for 15 minutes
                new \DateTime('15 min'),
                [
                    'version' => 'v4',
                ]
            );

            $brgyLogoRef = $database->collection('purok-leader')->document($userid);

            $brgyLogoRef->update([
                ['path' => 'brgyLogo', 'value' => $urlLogo]
            ]);

            $brgyUserIDRef = $database->collection('purok-leader')->document($userid);
            $brgyUser = $brgyUserIDRef->snapshot();

            $password = 'false';
            $notStrong = 'false';
            return view('pages.purok_manageaccounts', [
                'account'   => $brgyUser,
                'password'  => $password,
                'notStrong' => $notStrong
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
