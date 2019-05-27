<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 50; $i++) {
            $article = new Article();
            $article->setTitle(mb_strtolower($faker->sentence()))
                    ->setContent(mb_strtolower($faker->sentence()))
                    ->setCategory($this->getReference('category_' . rand(1, 3)));
            $manager->persist($article);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
