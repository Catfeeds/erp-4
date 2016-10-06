<?php namespace App\Repositories\Backend\Luster\Client;

use App\Models\Luster\Client\Client;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\Luster\Client\ClientContract;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Repositories\Frontend\Auth\AuthenticationContract;
use App\Exceptions\Backend\Luster\Client\ClientNeedsRolesException;

/**
 * Class EloquentClientRepository
 * @package App\Repositories\Client
 */
class EloquentClientRepository implements ClientContract {

	// /**
	//  * @var RoleRepositoryContract
	//  */
	// protected $role;

	// *
	//  * @var AuthenticationContract
	 
	// protected $auth;

	// /**
	//  * @param RoleRepositoryContract $role
	//  * @param AuthenticationContract $auth
	//  */
	// // public function __construct(RoleRepositoryContract $role, AuthenticationContract $auth) {
	// // 	$this->role = $role;
	// // 	$this->auth = $auth;
	// // }

	// /**
	//  * @param $id
	//  * @param bool $withRoles
	//  * @return mixed
	//  * @throws GeneralException
	//  */
	// public function findOrThrowException($id, $withRoles = false) {
	// 	if ($withRoles)
	// 		$Client = Client::find($id);
	// 	else
	// 		$Client = Client::find($id);

	// 	if (! is_null($Client)) return $Client;

	// 	throw new GeneralException('That Client does not exist.');
	// }

	/**
	 * @param $per_page
	 * @param string $order_by
	 * @param string $sort
	 * @param int $status
	 * @return mixed
	 */
	public function getClientsPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc') {
		return Client::where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
	}

	// /**
	//  * @param $per_page
	//  * @return \Illuminate\Pagination\Paginator
	//  */
	// public function getDeletedClientsPaginated($per_page) {
	// 	return Client::onlyTrashed()->paginate($per_page);
	// }

	// /**
	//  * @param string $order_by
	//  * @param string $sort
	//  * @return mixed
	//  */
	// public function getAllClients($order_by = 'id', $sort = 'asc') {
	// 	return Client::orderBy($order_by, $sort)->get();
	// }

	// /**
	//  * @param $input
	//  * @param $roles
	//  * @param $permissions
	//  * @return bool
	//  * @throws GeneralException
	//  * @throws ClientNeedsRolesException
	//  */
	// public function create($input, $roles, $permissions) {
	// 	$Client = $this->createClientStub($input);

	// 	if ($Client->save()) {
	// 		//Client Created, Validate Roles
	// 		$this->validateRoleAmount($Client, $roles['assignees_roles']);

	// 		//Attach new roles
	// 		$Client->attachRoles($roles['assignees_roles']);

	// 		//Attach other permissions
	// 		$Client->attachPermissions($permissions['permission_Client']);

	// 		//Send confirmation email if requested
	// 		if (isset($input['confirmation_email']) && $Client->confirmed == 0)
	// 			$this->auth->resendConfirmationEmail($Client->id);

	// 		return true;
	// 	}

	// 	throw new GeneralException('There was a problem creating this Client. Please try again.');
	// }

	// /**
	//  * @param $id
	//  * @param $input
	//  * @param $roles
	//  * @return bool
	//  * @throws GeneralException
	//  */
	// public function update($id, $input, $roles, $permissions) {
	// 	$Client = $this->findOrThrowException($id);
	// 	$this->checkClientByEmail($input, $Client);

	// 	if ($Client->update($input)) {
	// 		//For whatever reason this just wont work in the above call, so a second is needed for now
	// 		$Client->status = isset($input['status']) ? 1 : 0;
	// 		$Client->confirmed = isset($input['confirmed']) ? 1 : 0;
	// 		$Client->save();

	// 		$this->checkClientRolesCount($roles);
	// 		$this->flushRoles($roles, $Client);
	// 		$this->flushPermissions($permissions, $Client);

	// 		return true;
	// 	}

	// 	throw new GeneralException('There was a problem updating this Client. Please try again.');
	// }

	// /**
	//  * @param $id
	//  * @param $input
	//  * @return bool
	//  * @throws GeneralException
	//  */
	// public function updatePassword($id, $input) {
	// 	$Client = $this->findOrThrowException($id);

	// 	//Passwords are hashed on the model
	// 	$Client->password = $input['password'];
	// 	if ($Client->save())
	// 		return true;

	// 	throw new GeneralException('There was a problem changing this Clients password. Please try again.');
	// }

	// /**
	//  * @param $id
	//  * @return bool
	//  * @throws GeneralException
	//  */
	// public function destroy($id) {
	// 	if (auth()->id() == $id)
	// 		throw new GeneralException("You can not delete yourself.");

	// 	$Client = $this->findOrThrowException($id);
	// 	if ($Client->delete())
	// 		return true;

	// 	throw new GeneralException("There was a problem deleting this Client. Please try again.");
	// }

	// /**
	//  * @param $id
	//  * @return boolean|null
	//  * @throws GeneralException
	//  */
	// public function delete($id) {
	// 	$Client = $this->findOrThrowException($id, true);

	// 	//Detach all roles & permissions
	// 	$Client->detachRoles($Client->roles);
	// 	$Client->detachPermissions($Client->permissions);

	// 	try {
	// 		$Client->forceDelete();
	// 	} catch (\Exception $e) {
	// 		throw new GeneralException($e->getMessage());
	// 	}
	// }

	// *
	//  * @param $id
	//  * @return bool
	//  * @throws GeneralException
	 
	// public function restore($id) {
	// 	$Client = $this->findOrThrowException($id);

	// 	if ($Client->restore())
	// 		return true;

	// 	throw new GeneralException("There was a problem restoring this Client. Please try again.");
	// }

	// /**
	//  * @param $id
	//  * @param $status
	//  * @return bool
	//  * @throws GeneralException
	//  */
	// public function mark($id, $status) {
	// 	if (auth()->id() == $id && ($status == 0 || $status == 2))
	// 		throw new GeneralException("You can not do that to yourself.");

	// 	$Client = $this->findOrThrowException($id);
	// 	$Client->status = $status;

	// 	if ($Client->save())
	// 		return true;

	// 	throw new GeneralException("There was a problem updating this Client. Please try again.");
	// }

	// /**
	//  * Check to make sure at lease one role is being applied or deactivate Client
	//  * @param $Client
	//  * @param $roles
	//  * @throws ClientNeedsRolesException
	//  */
	// private function validateRoleAmount($Client, $roles) {
	// 	//Validate that there's at least one role chosen, placing this here so
	// 	//at lease the Client can be updated first, if this fails the roles will be
	// 	//kept the same as before the Client was updated
	// 	if (count($roles) == 0) {
	// 		//Deactivate Client
	// 		$Client->status = 0;
	// 		$Client->save();

	// 		$exception = new ClientNeedsRolesException();
	// 		$exception->setValidationErrors('You must choose at lease one role. Client has been created but deactivated.');

	// 		//Grab the Client id in the controller
	// 		$exception->setClientID($Client->id);
	// 		throw $exception;
	// 	}
	// }

	// /**
	//  * @param $input
	//  * @param $Client
	//  * @throws GeneralException
	//  */
	// private function checkClientByEmail($input, $Client)
	// {
	// 	//Figure out if email is not the same
	// 	if ($Client->email != $input['email'])
	// 	{
	// 		//Check to see if email exists
	// 		if (Client::where('email', '=', $input['email'])->first())
	// 			throw new GeneralException('That email address belongs to a different Client.');
	// 	}
	// }

	// /**
	//  * @param $roles
	//  * @param $Client
	//  */
	// private function flushRoles($roles, $Client)
	// {
	// 	//Flush roles out, then add array of new ones
	// 	$Client->detachRoles($Client->roles);
	// 	$Client->attachRoles($roles['assignees_roles']);
	// }

	// /**
	//  * @param $permissions
	//  * @param $Client
	//  */
	// private function flushPermissions($permissions, $Client)
	// {
	// 	//Flush permissions out, then add array of new ones if any
	// 	$Client->detachPermissions($Client->permissions);
	// 	if (count($permissions['permission_Client']) > 0)
	// 		$Client->attachPermissions($permissions['permission_Client']);
	// }

	// /**
	//  * @param $roles
	//  * @throws GeneralException
	//  */
	// private function checkClientRolesCount($roles)
	// {
	// 	//Client Updated, Update Roles
	// 	//Validate that there's at least one role chosen
	// 	if (count($roles['assignees_roles']) == 0)
	// 		throw new GeneralException('You must choose at least one role.');
	// }

	// /**
	//  * @param $input
	//  * @return mixed
	//  */
	// private function createClientStub($input)
	// {
	// 	$Client = new Client;
	// 	$Client->name = $input['name'];
	// 	$Client->email = $input['email'];
	// 	$Client->password = $input['password'];
	// 	$Client->status = isset($input['status']) ? 1 : 0;
	// 	$Client->confirmation_code = md5(uniqid(mt_rand(), true));
	// 	$Client->confirmed = isset($input['confirmed']) ? 1 : 0;
	// 	return $Client;
	// }
}