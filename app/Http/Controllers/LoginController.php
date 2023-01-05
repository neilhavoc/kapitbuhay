<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Alert;
use App\Http\Controllers\Exception;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn as invalidInput;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Http\Helpers\FirebaseHelper;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //session()->flush();
        return view('pages.loginpage');
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

    public function invalidEmailorPassword($isInvalid)
    {
        $isInvalid = 1;
        echo 'alert("Invalid Email or Password!")';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = app('firebase.auth');

        $email = $request->input('email');
        $password = $request->input('password');

        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $vawUsers = $database->collection('barangay_accounts');
        $idRefVAW = $vawUsers->documents();
        $policeUsers = $database->collection('police_accounts');
        $idRefPolice = $policeUsers->documents();

        foreach ($idRefVAW as $vawID)
        {
            if ($vawID['brgyEmail'] == $email)
            {
                $user = $auth->getUser($vawID['brgyUID']);
                $verify = $user->emailVerified;

                if ($verify == 1)
                {
                    if ($vawID['verification_status'] == 'To Verify' && $vawID['account_status'] == 'Not Banned') {
                        return redirect('loginpage')->withSuccess('Account is not yet Verified!');
                    }
                    elseif ($vawID['verification_status'] == 'Verified' && $vawID['account_status'] == 'Not Banned') {
                        try
                        {
                            $signInResult = $auth->signInWithEmailAndPassword($email, $password);
                            session(['userID' => $vawID['brgyUID']]);
                            session(['brgyName' => $vawID['brgyName']]);
                            session(['barangay' => $vawID['barangay']]);
                            session(['vawstaffname' => $vawID['brgyStaffFullName']]);

                            return redirect('vaw_manageaccount');
                        } catch(invalidInput $e) {
                            return redirect('loginpage')->withSuccess('Invalid Email or Password!');
                        };
                    }
                    elseif ($vawID['account_status'] == 'Banned') {
                        return redirect('loginpage')->withSuccess('Account is banned!');
                    }
                    elseif ($vawID['verification_status'] == 'Verification Failed') {

                    }
                }
                else
                {
                    return redirect('loginpage')->withSuccess('Account is not yet verified! Please check email');
                }

            }
        }

        foreach($idRefPolice as $polID)
        {
            if ($polID['policeEmail'] == $email)
            {
                if ($polID['verification_status'] == 'To Verify' && $polID['account_status'] == 'Not Banned') {
                    return redirect('loginpage')->withSuccess('Account is not yet Verified!');
                }
                elseif ($polID['verification_status'] == 'Verified' && $polID['account_status'] == 'Not Banned') {
                    try
                    {
                        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
                        session(['userID' => $polID['policeUID']]);
                        session(['policeName' => $polID['policeName']]);
                        session(['barangay' => $polID['barangay']]);
                        return redirect('police_manageaccount');
                    } catch(invalidInput $e) {
                        return redirect('loginpage')->withSuccess('Invalid Email or Password!');
                    };
                }
                elseif ($polID['account_status'] == 'Banned') {
                    return redirect('loginpage')->withSuccess('Account is banned!');
                }
                elseif ($polID['verification_status'] == 'Verification Failed') {

                }
            }
        }

        try
        {
            $signInResult = $auth->signInWithEmailAndPassword($email, $password);
            session(['adminID' => $email]);
            return redirect('dashboard');
        } catch(invalidInput $e) {
            return redirect('loginpage')->withSuccess('Invalid Email or Password!');
        };
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
