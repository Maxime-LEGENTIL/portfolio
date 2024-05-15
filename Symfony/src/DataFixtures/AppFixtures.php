<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //$users = [];

        $user = new User();
        $user->setEmail('maxime.legentil17@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$2y$13$dYgOL5UZOgJlhcbUqO2ceeujKd0pflZvvsobtpIgAp20ygBNFq7Mu'); // Bcrypt -> Mot de passe = admin
        $user->setFirstname('Maxime');
        $user->setLastname('LE GENTIL');

        $manager->persist($user);
        $manager->flush();

        $article = new Blog();
        $article->setTitle('Ouverture du portfolio');
        $article->setContent('Le contenu d\'un article ! On peut y insérer des balises HTML.');
        $article->setAuthor($user);
        $article->setCreatedAt(new DateTimeImmutable());
        $article->setImage('https://www.larochelle-tourisme.com/sites/default/files/styles/ogimage/public/medias/images/_32919.jpg?itok=s-Y2oGQ0');

        $manager->persist($article);
        $manager->flush();
    }
}
