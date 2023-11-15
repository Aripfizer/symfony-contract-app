<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }


    public function load(ObjectManager $manager): void
    {
        $email = 'admin@contracts.com';

        // Vérifier si l'utilisateur existe déjà
        $existingUser = $manager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$existingUser) {
            // L'utilisateur n'existe pas, créer un nouvel utilisateur
            $user = new User();
            $user->setEmail($email);

            $password = $this->hasher->hashPassword($user, 'admin');

            $user->setPassword($password);

            // Persiste et flush
            $manager->persist($user);
            $manager->flush();
        }
        $user = new User();
        $user->setEmail("arieldossou00@gmail.com");

        $password = $this->hasher->hashPassword($user, 'password');

        $user->setPassword($password);

        // Persiste et flush
        $manager->persist($user);
        $manager->flush();
    }
}
