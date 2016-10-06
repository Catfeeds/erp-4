<?php namespace App\Repositories\Backend\Luster\Client;

/**
 * Interface ClientContract
 * @package App\Repositories\Client
 */
interface ClientContract {

	// /**
	//  * @param $id
	//  * @param bool $withRoles
	//  * @return mixed
	//  */
	// public function findOrThrowException($id, $withRoles = false);

	// /**
	//  * @param $per_page
	//  * @param string $order_by
	//  * @param string $sort
	//  * @param $status
	//  * @return mixed
	//  */
	public function getClientsPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc');

	// /**
	//  * @param $per_page
	//  * @return \Illuminate\Pagination\Paginator
	//  */
	// public function getDeletedClientsPaginated($per_page);

	// /**
	//  * @param string $order_by
	//  * @param string $sort
	//  * @return mixed
	//  */
	// public function getAllClients($order_by = 'id', $sort = 'asc');

	// /**
	//  * @param $input
	//  * @param $roles
	//  * @return mixed
	//  */
	// public function create($input, $roles, $permissions);

	// /**
	//  * @param $id
	//  * @param $input
	//  * @param $roles
	//  * @return mixed
	//  */
	// public function update($id, $input, $roles, $permissions);

	// /**
	//  * @param $id
	//  * @return mixed
	//  */
	// public function destroy($id);

	// /**
	//  * @param $id
	//  * @return mixed
	//  */
	// public function delete($id);

	// /**
	//  * @param $id
	//  * @return mixed
	//  */
	// public function restore($id);

	// /**
	//  * @param $id
	//  * @param $status
	//  * @return mixed
	//  */
	// public function mark($id, $status);

	// /**
	//  * @param $id
	//  * @param $input
	//  * @return mixed
	//  */
	// public function updatePassword($id, $input);
}