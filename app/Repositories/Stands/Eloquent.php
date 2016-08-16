<?php
namespace App\Repositories\Stands;

use App\Repositories\AbstractRepository;

class Eloquent extends AbstractRepository implements Contract
{
	public function getById($id) 
	{
		return $this->model->findOrFail($id);
	}
}