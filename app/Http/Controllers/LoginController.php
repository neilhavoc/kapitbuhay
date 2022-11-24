<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Alert;
use App\Http\Controllers\Exception;
use App\Http\Controllers\FailedToVerifyToken as failedToVerifyToken;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\UserNotFound as usernotFound;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\Http\Helpers\FirebaseHelper;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
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

        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        /*try {
            $user = $auth->getUserByEmail($email);

            try {
                $signInResult = $auth->signInWithEmailAndPassword($email, $password);
                $idTokenString = $signInResult->idToken();

                try {
                    $verifiedIdToken = $auth->verifyIdToken($idTokenString);

                } catch (failedToVerifyToken $e) {
                    echo 'The token is invalid: '.$e->getMessage();
                }
            } catch(usernotFound $e) {
                return redirect('loginpage');
                exit();
            }

        } catch(usernotFound $e) {
            $_SESSION = "Invalid Email Address";
            return redirect('loginpage');
            exit();
        }*/


        return redirect('manage_articles');






        /*$loginuid = $signInResult->firebaseUserId();

        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $data = [
            'email' => $request->input('email'),
            'user-uid' => $loginuid,

        ];

        $database->collection('admin')->document($loginuid)->set($data);
        */


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
