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
        $storage = app('firebase.storage');

        $bucket = $storage->getBucket();
        $image = $request->file('filename');
        $imgname = $image->getClientOriginalName();
        //$extension = $image->getClientOriginalExtension();
        //$file      = $image. '.' . $extension;
        $localfolder = public_path('storage-temp-folder') .'/';
        $storagedata = [
            'name' => 'barangay-vaw/credentials/new-name.png',
        ];

        if ($image->move($localfolder, $imgname)) {
            $imgfile = fopen($localfolder.$imgname, 'r');
            $bucket->upload($imgfile, $storagedata);
            //will remove from local laravel folder
            unlink($localfolder . $imgname);
          }

        $auth = app('firebase.auth');

        $userProperties = [
            'email' => $request->input('email'),
            'emailVerified' => false,
            'phoneNumber' => sprintf('+63%s', $request->input('brgyConNum1')),
            'password' => $request->input('password'),
            'displayName' => $request->input('brgyName'),
            'disabled' => false,
        ];

        $createdUser = $auth->createUser($userProperties);

        $signInResult = $auth->signInWithEmailAndPassword($request->input('email'), $request->input('password'));

        $loginuid = $signInResult->firebaseUserId();

        $firestore = app('firebase.firestore');

        $database = $firestore->database();
        $data = [
            'brgyName' => $request->input('brgyName'),
            'brgyContactNum1' => $request->input('brgyConNum1'),
            'brgyContactNum2' => $request->input('brgyConNum2'),
            'brgyProvince' => $request->input('province'),
            'brgycity' => $request->input('city'),
            'barangay' => $request->input('barangay'),
            'brgyPurok' => $request->input('purok'),
            'brgyStreet' => $request->input('street'),
            'brgyEmail' => $request->input('email'),
            'brgyPassword' => $request->input('password'),
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
