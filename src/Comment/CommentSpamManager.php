<?php

namespace App\Comment;

use App\Entity\Comment;
use App\Service\RegexSpamWordHelper;

class CommentSpamManager
{
    private RegexSpamWordHelper $regexSpamWordHelper;

    public function __construct(RegexSpamWordHelper $regexSpamWordHelper)
    {
        $this->regexSpamWordHelper = $regexSpamWordHelper;
    }
    
    public function validate(Comment $comment): void
    {
        $content = $comment->getContent();
        $badWordsOnComment = $this->regexSpamWordHelper->getMatchedSpamWords($content);
        
        if (count($badWordsOnComment) >= 2) {
            // We could throw a custom exception if needed
            throw new \RuntimeException('Message detected as spam');
        }
    }
}
