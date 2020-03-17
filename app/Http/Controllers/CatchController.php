<?php

namespace App\Http\Controllers;

use App\Services\CatchService;

class CatchController extends Controller
{
    public function index(CatchService $catchService)
    {
        $constellations = $catchService->getConstellations(date("Y-m-d"));

        return view('constellation.index', compact('constellations'));
    }

    public function store(CatchService $catchService)
    {
        try {
            // 抓取資料
            $createData = $catchService->prepareConstellationData();
            // 新增
            $catchService->insertConstellation($createData);
        } catch (\Exception $e) {
            return errorResponse($e->getCode(), $e);
        }
    }
}
