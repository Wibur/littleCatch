<?php

namespace App\Services;

use App\Repositories\ContellationRepository;

class CatchService
{
    private $contellation;

    public function __construct(ContellationRepository $contellation)
    {
        $this->contellation = $contellation;
    }

    /**
     * 從DB抓資料
     */
    public function getConstellations($date)
    {
        return $this->contellation->get($date);
    }

    /**
     * 取得星座資料
     */
    public function prepareConstellationData()
    {
        $data = [];
        $curl = curl_init();
        $baseUrl = 'http://astro.click108.com.tw/';
        for ($i = 0; $i < 12; $i++) {
            $url = $baseUrl . "daily_{$i}.php?iAstro={$i}";
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $htmlresult = curl_exec($curl);
            preg_match_all('/<h3>今日(.*?)解析<\/h3>\\r\\n/', $htmlresult, $name);
            preg_match_all('!<span class="txt_green">(.*?)：<\/span>!', $htmlresult, $a_fortune);
            preg_match_all("!：<\/span><\/p><p>(.*?)<\/p>\\r\\n!", $htmlresult, $description);
            preg_match_all('/<span class="txt_pink">(.*?)：<\/span>/', $htmlresult, $l_fortune);
            preg_match_all('/<span class="txt_blue">(.*?)：<\/span>/', $htmlresult, $w_fortune);
            preg_match_all('/<span class="txt_orange">(.*?)：<\/span>/', $htmlresult, $f_fortune);

            $data[] = [
                'today_date' => date("Y-m-d"),
                'constellation_name' => $name[1][0],
                'overall_fortune' => $a_fortune[1][0],
                'overall_description' => $description[1][0],
                'love_fortune' => $l_fortune[1][0],
                'love_description' => $description[1][1],
                'work_fortune' => $w_fortune[1][0],
                'work_description' => $description[1][2],
                'future_fortune' => $f_fortune[1][0],
                'future_description' => $description[1][3],
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ];
        }

        return $data;
    }

    /**
     * 插入資料
     */
    public function insertConstellation(array $data)
    {
        $isCreated = $this->contellation->insert($data);

        if ($isCreated === false) {
            throw new \Exception('新增失敗', 500);
        }
    }
}
