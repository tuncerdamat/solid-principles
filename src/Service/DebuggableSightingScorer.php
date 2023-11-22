<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\DebuggableBigFootSightingScore;

class DebuggableSightingScorer extends SightingScorer
{
    public function score(BigFootSighting $bigFootSighting): DebuggableBigFootSightingScore
    {
        $bfScore = parent::score($bigFootSighting);
        
        return new DebuggableBigFootSightingScore(
            $bfScore->getScore(),
            100
        );
    }
}
