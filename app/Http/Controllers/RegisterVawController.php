<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase\Value\Uid;

class RegisterVawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.register_vaw');
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
            'phoneNumber' => sprintf('+63%s', $request->input('brgyConNum1')),
            'password' => $request->input('password'),
            'displayName' => $request->input('brgyName'),
            'disabled' => false,
        ];

        //create user
        $createdUser = $auth->createUser($userProperties);

        //signin user to get the UID
        $signInResult = $auth->signInWithEmailAndPassword($request->input('email'), $request->input('password'));

        $loginuid = $signInResult->firebaseUserId();

        //store image in firebase storage
        $bucket = $storage->getBucket();
        $fileLocation = $bucket;

        //get the user-input image
        $imagebrgyLogo = $request->file('fileBrgyLogo');
        $imagebrgyValidIDFront = $request->file('fileBrgyIDFront');
        $imagebrgyValidIDBack = $request->file('fileBrgyIDBack');

        //get the original name of the file
        $brgyLogoName = $imagebrgyLogo->getClientOriginalName();
        $brgyIDFront = $imagebrgyValidIDFront->getClientOriginalName();
        $brgyIDBack = $imagebrgyValidIDBack->getClientOriginalName();

        //store to temporary local folder
        $localfolder = public_path('storage-temp-folder') .'/';

        //create file path in storage
        $brgyLogo = [
            'name' => 'barangay-vaw/' . $loginuid . '/credentials/Barangay-Logo.png',
        ];
        $brgyValidIDFront = [
            'name' => 'barangay-vaw/' . $loginuid . '/credentials/Barangay-Valid-ID-Front.png',
        ];
        $brgyValidIDBack = [
            'name' => 'barangay-vaw/' . $loginuid . '/credentials/Barangay-Valid-ID-Back.png',
        ];


        //$object = $bucket->object('barangay-vaw/' . $loginuid . '/credentials/Barangay-Logo.png');

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
            'brgyName'        => $request->input('brgyName'),
            'brgyContactNum1' => $request->input('brgyConNum1'),
            'brgyContactNum2' => $request->input('brgyConNum2'),
            'brgyLogo'        => 'empty',
            'brgyValidIDFront'=> 'empty',
            'brgyValidIDBack' => 'empty',
            'brgyUID'         => $loginuid,
            'brgyProvince'    => $request->input('province'),
            'brgycity'        => $request->input('city'),
            'barangay'        => $request->input('barangay'),
            'brgyPurok'       => $request->input('purok'),
            'brgyStreet'      => $request->input('street'),
            'brgyEmail'       => $request->input('email'),
            'brgyPassword'    => $request->input('password'),
        ];

        $database->collection('barangay_accounts')->document($loginuid)->set($data);

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
