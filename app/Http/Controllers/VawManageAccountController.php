<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawManageAccountController extends Controller
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

            $password = 'false';
            $notStrong = 'false';
            return view('pages.vaw_manageaccounts', [
                'account'   => $brgyUser,
                'password'  => $password,
                'notStrong' => $notStrong
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
        $firestore = app('firebase.firestore');
        $auth = app('firebase.auth');

        $database = $firestore->database();
        $userid = session('userID');

        $brgyUserIDRef = $database->collection('barangay_accounts')->document($userid);
        $brgyUser = $brgyUserIDRef->snapshot();

        $inputpass = $request->input('password');
        $uppercase = preg_match('@[A-Z]@', $inputpass);
        $lowercase = preg_match('@[a-z]@', $inputpass);
        $number    = preg_match('@[0-9]@', $inputpass);
        $specialChars = preg_match('@[^\w]@', $inputpass);


        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($inputpass) < 8) {
            $notStrong  = 'true';
            $password   = 'false';
            return view('pages.vaw_manageaccounts', [
                'account'   => $brgyUser,
                'password'  => $password,
                'notStrong' => $notStrong
            ]);
        }
        elseif ($request->input('password') == $request->input('conpassword'))
        {
            $updatedUser = $auth->changeUserPassword($userid, $request->input('password'));
            $brgyUserIDRef->update([['path' => 'brgyPassword', 'value' => $request->input('password')]]);

            return redirect('vaw_manageaccount');
        }
        else
        {
            $password = 'true';
            $notStrong  = 'false';
            return view('pages.vaw_manageaccounts', [
                'account'   => $brgyUser,
                'password'  => $password,
                'notStrong' => $notStrong
            ]);
        }
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
