<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use App\SocialAccount;
use App\User;

class SocialAccountController extends Controller
{
   //we need to send authorization grant to provider for getting token
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();

    }
    //recieving the token
    public function handleProviderCallback($provider)
    {
    	try
    	{
    		$socialUser = Socialite::driver($provider)->user();

    	}
    	catch(Exception $e)
    	{
    		return redirect()->route('upload');
    	}

    	$authUser = $this->findOrCreateUser($socialUser,$provider);
    	Auth::login($authUser,true);
    	return redirect()->route('contact');

    }

    public function findOrCreateUser($socialUser, $provider)
    {
      $account = SocialAccount::where('provider_name', $provider)->where('provider_id', $socialUser->getId())->first();
    if ($account) 
    {
      return $account->user;
    } 
    else 
    {
      $user = User::where('email', $socialUser->getEmail())->first();
      if (! $user) 
      {
        $user = User::create([
          'email' => $socialUser->getEmail(),
          'name' => $socialUser->getName(),
        ]);
      }
      $user->accounts()->create([
        'provider_name' => $provider,
        'provider_id' => $socialUser->getId(),
      ]);
      return $user;
    }
  }
}
