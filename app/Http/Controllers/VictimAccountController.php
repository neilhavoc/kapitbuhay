<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Firestore;

class VictimAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$auth = app('firebase.auth');
        //$user = $auth->getUserByEmail('sarioneiljohm@gmail.com');
        //$userid = $user->uid;

        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $userRef = $database->collection('civilian-users');
        $civilianUsers = $userRef->documents();

        return view('pages.manage_VictimAccounts', [
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $userRef = $database->collection('civilian-users');
        $idRef = $userRef->where($userRef->id(), '=', $id);
        $civilianUsers = $idRef->documents();

        return view('pages.manage_VictimAccounts', [
            'account' => $civilianUsers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //VictimAcc/{VictimAcc}
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

        $civilianUsers = $database->collection('civilian-users')->document($id);
        $civilianUsers->update([
                    ['path' => 'verification_status', 'value' => $request->input('verification')]
                ]);
        return redirect('VictimAcc');
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
