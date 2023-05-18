<?php

namespace App\Http\Controllers;

use Google\Service\Drive;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use League\Flysystem\Config;
use League\Flysystem\Filesystem;
use League\Flysystem\Visibility;
use Masbug\Flysystem\GoogleDriveAdapter;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route('home');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                ]);

                Auth::login($newUser);

                return redirect()->route('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function connectToGoogleDrive()
    {
        $client = new Google_Client();
        $client->setClientId(env("GOOGLE_DRIVE_CLIENT_ID"));
        $client->setClientSecret(env("GOOGLE_DRIVE_CLIENT_SECRET"));
        $client->refreshToken(env("GOOGLE_DRIVE_REFRESH_TOKEN"));
        $client->setApplicationName('eTerne');

        $service = new Google_Service_Drive($client);

        // variant 1
        $adapter = new GoogleDriveAdapter($service, 'My_App_Root');

        
    }
}