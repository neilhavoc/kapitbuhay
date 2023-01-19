<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawMonitoringController extends Controller
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
            $database = $firestore->database();


            $monitoringIDRef = $database->collection('monitoring_reports');
            $monitoringRef = $monitoringIDRef->documents();

            if (session('searchedtrue') != null)
            {
                $isSearched = session('searchedtrue');

                session(['searchedtrue' => null]);
            }
            else
            {
                $isSearched = 'empty';
            }

            return view('pages.vaw_monitoring', [
                'reports' => $monitoringRef,
                'isSearched' => $isSearched
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
        session(['viewMonitoringReport' => $request->input('monitoringID')]);

        return redirect('vaw_updatehealthmonitoring');
    }

    public function displaySpecific(Request $request)
    {
        $isSearched = $request->input('sortby');
        session(['searchedtrue' => $isSearched]);

        return redirect('vaw_monitoring');
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
