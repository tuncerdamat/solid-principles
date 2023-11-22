<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\BigFootSightingScore;
use App\Scoring\ScoringFactorInterface;

class SightingScorer
{
    /**
     * @var ScoringFactorInterface[]
     */
    private iterable $scoringFactors;

    public function __construct(iterable $scoringFactors)
    {
        $this->scoringFactors = $scoringFactors;
    }
    
    public function score(BigFootSighting $bigFootSighting): BigFootSightingScore
    {
        $score = 0;
        foreach ($this->scoringFactors as $scoringFactor) {
            $score += $scoringFactor->score($bigFootSighting);
        }

        return new BigFootSightingScore($score);
    }
}
