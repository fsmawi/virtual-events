<?php
namespace App\Repositories\Events;

use App\Repositories\AbstractRepository;

class Eloquent extends AbstractRepository implements Contract
{
	
	public function all() 
	{
		return $this->model->all();
	}

	public function getNotStarted()
	{
		return $this->model->notStarted()->get();
	}

	public function getStarted()
	{
		return $this->model->started()->get();
	}

	public function getByDependencies()
	{
		return $this->model->with('stands', 'stands.company')->get();
	}

	
	public function getById($id) 
	{
		return $this->model->findOrFail($id);
	}



}