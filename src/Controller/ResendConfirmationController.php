<?php

namespace App\Controller;

use App\Service\ConfirmationEmailSender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResendConfirmationController extends AbstractController
{
    /**
     * @Route("/resend-confirmation", methods={"POST"})
     */
    public function resend(ConfirmationEmailSender $confirmationEmailSender)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $confirmationEmailSender->send($this->getUser());

        return new Response(null, 204);
    }
}
