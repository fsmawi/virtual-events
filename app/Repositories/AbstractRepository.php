<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}