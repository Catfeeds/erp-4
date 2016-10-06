<?php namespace App\Repositories\Frontend\Auth;

use App\Models\Access\User\User;
use App\Exceptions\GeneralException;
use Illuminate\Contracts\Auth\Guard;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use App\Repositories\Frontend\User\UserContract;
use Laravel\Socialite\Contracts\Factory as Socialite;

/**
 * Class Registrar
 * @package App\Services
 */
class EloquentAuthenticationRepository implements AuthenticationContract {

	/**
	 * @var Socialite
	 */
	private $socialite;
	/**
	 * @var Guard
	 */
	private $auth;
	/**
	 * @var UserContract
	 */
	private $users;

	/**
	 * @param Socialite $socialite
	 * @param Guard $auth
	 * @param UserContract $users
	 */
	public function __construct(Socialite $socialite, Guard $auth, UserContract $users) {
		$this->socialite = $socialite;
		$this->users = $users;
		$this->auth = $auth;
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return $this->users->create($data);
	}

	/**
	 * @param $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws GeneralException
	 */
	public function login($request) {
		if ($this->auth->attempt($request->only('email', 'password'), $request->has('remember')))
		{

			if ($this->auth->user()->status == 0)
			{
				$this->auth->logout();
				throw new GeneralException("您的帐户目前停用。");
			}

			if ($this->auth->user()->status == 2)
			{
				$this->auth->logout();
				throw new GeneralException("您的帐户目前被禁止的。");
			}

			if ($this->auth->user()->confirmed == 0)
			{
				$user_id = $this->auth->user()->id;
				$this->auth->logout();
				throw new GeneralException("您的帐户没有得到证实。请点击确认链接的电子邮件，或".'<a href="'.route('account.confirm.resend', $user_id).'">click here</a>'." 重新发送确认电子邮件。");
			}

			event(new UserLoggedIn($this->auth->user()));
			return true;
		}

		throw new GeneralException('帐户或密码不正确，请核对后重试。');
	}

	/**
	 * Log the user out and fire an event
	 */
	public function logout() {
		event(new UserLoggedOut($this->auth->user()));
		$this->auth->logout();
	}

	/**
	 * Socialite Functions
	 */

	/**
	 * @param $request
	 * @param $provider
	 * @return bool|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function loginThirdParty($request, $provider) {
		if (! $request) return $this->getAuthorizationFirst($provider);
		$user = $this->users->findByUserNameOrCreate($this->getSocialUser($provider), $provider);
		$this->auth->login($user, true);
		event(new UserLoggedIn($user));
		return redirect()->route('frontend.dashboard');
	}

	/**
	 * @param $provider
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function getAuthorizationFirst($provider) {
		if ($provider == "google") {
			/*
			 * Only allows google to grab email address
			 * Default scopes array also has: 'https://www.googleapis.com/auth/plus.login'
			 * https://medium.com/@njovin/fixing-laravel-socialite-s-google-permissions-2b0ef8c18205
			 */
			$scopes = [
				'https://www.googleapis.com/auth/plus.me',
				'https://www.googleapis.com/auth/plus.profile.emails.read',
			];
			return $this->socialite->driver($provider)->scopes($scopes)->redirect();
		}
		return $this->socialite->driver($provider)->redirect();
	}

	/**
	 * @param $provider
	 * @return \Laravel\Socialite\Contracts\User
	 */
	public function getSocialUser($provider) {
		return $this->socialite->driver($provider)->user();
	}

	/**
	 * @param $token
	 * @return mixed
	 */
	public function confirmAccount($token) {
		return $this->users->confirmAccount($token);
	}

	/**
	 * @param $user_id
	 * @return mixed
	 */
	public function resendConfirmationEmail($user_id) {
		return $this->users->sendConfirmationEmail($user_id);
	}
}
