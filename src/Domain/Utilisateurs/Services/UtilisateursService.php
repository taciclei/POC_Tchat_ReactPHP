<?php

namespace Domain\Utilisateurs\Services;

use Doctrine\ORM\EntityManager;
use Infrastructure\Persistence\Doctrine\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class UtilisateursService
{

    public $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function add ($request) {

        //Todo verifier si le email existe deja
        //Todo mettre plus de securite sur le mot de passe
        $utilisateur = new User();
        $utilisateur->setUsername($request->get('user_name'));
        $utilisateur->setEmail($request->get('email'));
        $utilisateur->setPassword(sha1($request->get('password')));
        $utilisateur->setEnabled(true);
        $this->entityManager->persist($utilisateur);
        $this->entityManager->flush();
    }

    public function getUserId ($id) {

        $user = $this->entityManager->getRepository(
            User::class)->find($id);
        return $user;
    }

    public function getUser ($request) {

        $user = $this->entityManager->getRepository(
            User::class)->findOneBy([
                'email' => $request->get('email'),
                'password' => sha1($request->get('password'))
            ]
        );
        return $user;
    }
}