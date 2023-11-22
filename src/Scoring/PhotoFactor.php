<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class PhotoFactor implements ScoringFactorInterface
{
    public function score(BigFootSighting $bigFootSighting): int
    {
        if (count($bigFootSighting->getImages()) === 0) {
            return 0;
        }
        $score = 0;
        foreach ($bigFootSighting->getImages() as $image) {
            $score += rand(1, 100); 
        }
        return $score;
    }

}