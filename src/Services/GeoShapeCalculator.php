<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 24.03.19.
 * Time: 22:18
 */

namespace App\Services;

class GeoShapeCalculator
{
    public function areaSum(array $shapes): float
    {
        $areaSum = 0;
        foreach ($shapes as $shape) {
            $areaSum += $shape->area;
        }

        return $areaSum;
    }

    public function circumferenceSum(array $shapes): float
    {
        $circumferenceSum = 0;
        foreach ($shapes as $shape) {
            $circumferenceSum += $shape->circumference;
        }

        return $circumferenceSum;
    }
}
