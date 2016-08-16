<?php
namespace App\Repositories\Events;

interface Contract
{
	public function all();
	public function getStarted();
	public function getNotStarted();
	public function getByDependencies();
	public function getById($id);
}