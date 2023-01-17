<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VawCreateHealthMonitoringController extends Controller
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

        $victimUID = session('viewMonitoringReport');

        //getting number of days
        $phymonRef = $database->collection('record_IDs')->document($victimUID . '_physicalReport_IDs');
        $physicalmonitoringID = $phymonRef->snapshot();

        if ($physicalmonitoringID->exists())
        {
            $day = $physicalmonitoringID['day'] + 1;
        }
        else
        {
            $day = 1;
        }
        return view('pages.vaw_CreateHealthMonitoring', [
            'day' => $day
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
        $firestore = app('firebase.firestore');
        $storage = app('firebase.storage');

        $database = $firestore->database();
        $bucket = $storage->getBucket();

        $victimUID = session('viewMonitoringReport');

        //creating custom id
        $phymonRef = $database->collection('record_IDs')->document($victimUID . '_physicalReport_IDs');
        $physicalmonitoringID = $phymonRef->snapshot();

        if ($physicalmonitoringID->exists())
        {
            $newPhyMonID = $physicalmonitoringID['id'] + 1;

            $day = $physicalmonitoringID['day'] + 1;

            $phyMonID_Records = $database->collection('record_IDs')->document($victimUID . '_physicalReport_IDs');
            $phyMonID_Records->update([
                ['path' => 'id', 'value' => $newPhyMonID],
                ['path' => 'day', 'value' => $day]
            ]);
        }
        else
        {
            $data = [
                'id' => '100000',
                'day' => '1'
            ];
            $newPhyMonID = 100000;
            $day = 1;
            $database->collection('record_IDs')->document($victimUID . '_physicalReport_IDs')->set($data);
        }

        //store image in firebase storage
        $bucket = $storage->getBucket();

        //get the user-input image
        $imagePhyMon1 = $request->file('filephysicalmonitoring1');
        $imagePhyMon2 = $request->file('filephysicalmonitoring2');
        $imagePhyMon3 = $request->file('filephysicalmonitoring3');

        //get the original name of the file
        $namePhyMon1 = $imagePhyMon1->getClientOriginalName();
        $namePhyMon2 = $imagePhyMon2->getClientOriginalName();
        $namePhyMon3 = $imagePhyMon3->getClientOriginalName();

        //store to temporary local folder
        $localfolder = public_path('storage-temp-folder') .'/';

        //create file path in storage
        $imgMonitoring1 = [
            'name' => 'civilian-users/' . $victimUID . '/monitoringdetails_images/day' . $day . '/MonitoringImage1.png',
        ];
        $imgMonitoring2 = [
            'name' => 'civilian-users/' . $victimUID . '/monitoringdetails_images/day' . $day . '/MonitoringImage2.png',
        ];
        $imgMonitoring3 = [
            'name' => 'civilian-users/' . $victimUID . '/monitoringdetails_images/day' . $day . '/MonitoringImage3.png',
        ];

        //upload barangay Logo in Storage
        if ($imagePhyMon1->move($localfolder, $namePhyMon1)) {
            $imgfile = fopen($localfolder.$namePhyMon1, 'r');
            $bucket->upload($imgfile, $imgMonitoring1);
            //will remove from local laravel folder
            unlink($localfolder . $namePhyMon1);
        }

        //upload barangay Valid ID Front in Storage
        if ($imagePhyMon2->move($localfolder, $namePhyMon2)) {
            $imgfile = fopen($localfolder.$namePhyMon2, 'r');
            $bucket->upload($imgfile, $imgMonitoring2);
            //will remove from local laravel folder
            unlink($localfolder . $namePhyMon2);
        }

        //upload barangay Valid ID Back in Storage
        if ($imagePhyMon3->move($localfolder, $namePhyMon3)) {
            $imgfile = fopen($localfolder.$namePhyMon3, 'r');
            $bucket->upload($imgfile, $imgMonitoring3);
            //will remove from local laravel folder
            unlink($localfolder . $namePhyMon3);
        }

        //get the date
        date_default_timezone_set('Asia/Singapore');
        $date = date('m/d/Y h:i:s a', time());

        //setting up data for physical report
        $data = [
            'physicalmon_details'           => $request->input('physicalmonitoring'),
            'physicalmon_image1'            => '',
            'physicalmon_image2'            => '',
            'physicalmon_image3'            => '',
            'physicalmon_datecreated'       => $date,
            'physicalmon_monitoredby'       => session('vawstaffname'),
            'physicalmon_monitoredbyUID'    => session('userID'),
            'monitoring_day'                => $day,
            'physicalmon_brgy'              => session('barangay'),
            'mentalhealth_id'               => ''
        ];

        $database->collection('monitoring_reports')->document($victimUID)->collection('physicalhealth_monitoring')->document($newPhyMonID)->set($data);

        $victimMonitoring = $database->collection('monitoring_reports')->document($victimUID);
        $victimMonitoring->update([
            ['path' => 'monitoring_status', 'value' => 'Monitored'],
        ]);
        return redirect('vaw_updatehealthmonitoring');
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
