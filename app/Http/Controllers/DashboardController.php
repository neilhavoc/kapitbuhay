<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $victimUsers = $database->collection('civilian-users');
        $victimCount = $victimUsers->documents();
        $barangaysUsers = $database->collection('barangay_accounts');
        $vawCount = $barangaysUsers->documents();
        $policeUsers = $database->collection('police_accounts');
        $policeCount = $policeUsers->documents();

        $data = [
            'user-victims'      => 0,
            'police-accounts'   => 0,
            'vaw-accounts'      => 0,
            'total-accounts'    => 0,
        ];

        foreach($victimCount as $count)
        {
            if($count['verification_status'] == 'Verified' || $count['verification_status'] == 'To Verify')
            {
                $data['user-victims'] += 1;
            }
        }
        foreach($vawCount as $count)
        {
            if($count['verification_status'] == 'Verified' || $count['verification_status'] == 'To Verify')
            {
                $data['vaw-accounts'] += 1;
            }
        }
        foreach($policeCount as $count)
        {
            if($count['verification_status'] == 'Verified' || $count['verification_status'] == 'To Verify')
            {
                $data['police-accounts'] += 1;
            }
        }

        $data['total-accounts'] = $data['police-accounts'] + $data['vaw-accounts'] + $data['user-victims'];


        return view('pages.manage_dashboard', [
            'account' => $data,
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
