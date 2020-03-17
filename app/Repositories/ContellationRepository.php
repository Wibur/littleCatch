<?php

namespace App\Repositories;

use App\Models\Constellation;
use Illuminate\Database\QueryException;

class ContellationRepository
{
    private $model;

    public function __construct(Constellation $model)
    {
        $this->model = $model;
    }

    public function insert(array $data)
    {
        try {
            return $this->model->insert($data);
        } catch (QueryException $e) {
            return false;
        }
    }

    public function get($date)
    {
        try {
            // 只取最新12筆
            return $this->model::where('today_date', '=', $date)
                ->orderBy('created_at', 'DESC')
                ->take(12)
                ->get();
        } catch (QueryException $e) {
            return false;
        }
    }
}
