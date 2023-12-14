<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class DescriptionFactor implements ScoringFactorInterface
{
    public function score(BigFootSighting $bigFootSighting): int
    {
        $score = 0;
        $title = strtolower($bigFootSighting->getDescription());

        if (stripos($title, 'hairy') !== false) {
            $score += 10;
        }

        if (stripos($title, 'chased me') !== false) {
            $score += 20;
        }

        if (stripos($title, 'using an iPhone') !== false) {
            $score -= 50;
        }

        return $score;
    }
}
