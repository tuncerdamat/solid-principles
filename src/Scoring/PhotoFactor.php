<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class PhotoFactor implements ScoringFactorInterface, ScoreAdjusterInterface
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

    public function adjustScore(int $finalScore, BigFootSighting $sighting): int
    {
        $photosCount = count($sighting->getImages());

        if ($finalScore < 50 && $photosCount > 2) {
            $finalScore += $photosCount * 5;
        }

        return $finalScore;
    }

}
