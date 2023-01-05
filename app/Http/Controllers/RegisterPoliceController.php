<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notEqual = 'false';
        $password = 'false';
        $notStrong = 'false';
        return view('pages.register_police', [
            'notEqual' => $notEqual,
            'password' => $password,
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
        //initialize firebase
        $storage = app('firebase.storage');
        $auth = app('firebase.auth');
        $firestore = app('firebase.firestore');

        //store user details for auth account
        $userProperties = [
            'email' => $request->input('email'),
            'emailVerified' => false,
            'phoneNumber' => sprintf('+63%s', $request->input('policeContact1')),
            'password' => $request->input('password'),
            'displayName' => $request->input('policeStationName'),
            'disabled' => false,
        ];

        //create user
        $createdUser = $auth->createUser($userProperties);

        //signin user to get the UID
        $signInResult = $auth->signInWithEmailAndPassword($request->input('email'), $request->input('password'));

        $loginuid = $signInResult->firebaseUserId();

        //store image in firebase storage
        $bucket = $storage->getBucket();
        //$fileLocation = $bucket;

        //get the user-input image
        $imagebrgyLogo = $request->file('filePoliceLogo');
        $imagebrgyValidIDFront = $request->file('filePoliceIDFront');
        $imagebrgyValidIDBack = $request->file('filePoliceIDBack');

        //get the original name of the file
        $brgyLogoName = $imagebrgyLogo->getClientOriginalName();
        $brgyIDFront = $imagebrgyValidIDFront->getClientOriginalName();
        $brgyIDBack = $imagebrgyValidIDBack->getClientOriginalName();

        //store to temporary local folder
        $localfolder = public_path('storage-temp-folder') .'/';

        //create file path in storage
        $brgyLogo = [
            'name' => 'police-accounts/' . $loginuid . '/credentials/Police-Logo.png',
        ];
        $brgyValidIDFront = [
            'name' => 'police-accounts/' . $loginuid . '/credentials/Police-Valid-ID-Front.png',
        ];
        $brgyValidIDBack = [
            'name' => 'police-accounts/' . $loginuid . '/credentials/Police-Valid-ID-Back.png',
        ];

        //upload barangay Logo in Storage
        if ($imagebrgyLogo->move($localfolder, $brgyLogoName)) {
            $imgfile = fopen($localfolder.$brgyLogoName, 'r');
            $bucket->upload($imgfile, $brgyLogo);
            //will remove from local laravel folder
            unlink($localfolder . $brgyLogoName);
        }

        //upload barangay Valid ID Front in Storage
        if ($imagebrgyValidIDFront->move($localfolder, $brgyIDFront)) {
            $imgfile = fopen($localfolder.$brgyIDFront, 'r');
            $bucket->upload($imgfile, $brgyValidIDFront);
            //will remove from local laravel folder
            unlink($localfolder . $brgyIDFront);
        }

        //upload barangay Valid ID Back in Storage
        if ($imagebrgyValidIDBack->move($localfolder, $brgyIDBack)) {
            $imgfile = fopen($localfolder.$brgyIDBack, 'r');
            $bucket->upload($imgfile, $brgyValidIDBack);
            //will remove from local laravel folder
            unlink($localfolder . $brgyIDBack);
        }

        //getting the URL of the image
        //$stream = $object->gcsUri();


        //get the link of the uploaded image
        //store user details in firestore
        $database = $firestore->database();
        $data = [
            'policeName'              => $request->input('policeStationName'),
            'policeContactNum1'       => $request->input('policeContact1'),
            'policeContactNum2'       => $request->input('policeContact2'),
            'policeLogo'              => 'empty',
            'policeValidIDFront'      => 'empty',
            'policeValidIDBack'       => 'empty',
            'policeUID'               => $loginuid,
            'policeProvince'          => $request->input('province'),
            'policecity'              => $request->input('city'),
            'barangay'              => $request->input('barangay'),
            'policePurok'             => $request->input('purok'),
            'policeStreet'            => $request->input('street'),
            'policeEmail'             => $request->input('email'),
            'policePassword'          => $request->input('password'),
            'verification_status'   => 'To Verify',
            'account_status'        => 'Not Banned',
        ];

        $database->collection('police_accounts')->document($loginuid)->set($data);

        return redirect('loginpage');
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
