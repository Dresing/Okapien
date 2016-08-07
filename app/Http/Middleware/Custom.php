<?php

namespace App\Http\Middleware;


use App\APIAuth as APIAuth;
use Closure;

class Custom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

	//Time before a generated token runs out in seconds.
	private $expire = 60;

	public function handle($request, Closure $next)
    {
		
		$key = APIAuth::where('api_key', $request->input('key'))->first();
		
		if($key != null){
			if($this->authenticate($key->api_key, $key->secret, $request->input('token'))){
				return $next($request);
			}

		}
		return response()->json(['error' => 'Unauthorized.'], 401);
        
    }

	/**
	 * Takes an api_key and a secret, hashes them with the current timestamp and compare the result to a given token.
	 * The token will naturally expire after a set time defined in the object attributes. The method tries all
	 * possibilities within the expiry time-span to account for sever-client delay.
	 *
	 * @param $api_key string Key used in the hashing
	 * @param $secret string Secret used in the hashing
	 * @param $token string Token to compare the hash with
	 * @return bool Will return true if the authentication was successful, false upon failure.
	 */
	private function authenticate($api_key, $secret, $token){
			for ($i = 0; $i <= $this->expire; $i++):
				if (hash_hmac("sha256", time() - $i . $api_key, $secret) === $token):
					return true;
				endif;
			endfor;

			return false;
	}
}
