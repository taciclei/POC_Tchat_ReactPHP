<?php

namespace Domain\Salon\Services;


use Domain\Utilisateurs\Services\UtilisateursService;
use Infrastructure\Persistence\Doctrine\Entity\Message;
use Symfony\Component\HttpFoundation\Session\Session;

class SalonService
{

    public $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add ($messageItem) {


        $message = new Message();
        $messageItem = json_decode($messageItem);
        $message->setMessage($messageItem->message);

        $utilisateurService = new UtilisateursService($this->entityManager);
        $user = $utilisateurService->getUserId($messageItem->userId);

        $message->setUser($user);

        $this->entityManager->persist($message);
        $this->entityManager->flush();
    }

    public function obtenirMessages ($limite) {

        $messages = $this->entityManager->getRepository(
            Message::class)->findAll();

        return $messages;

    }

}