<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $rawCategories = file(__DIR__ . '/categories.txt', );
        $categories = array_map(fn (string $cat) => trim($cat), $rawCategories);

        $dbCategories = [];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);

            $manager->persist($category);
            $dbCategories[] = $category;
        }

        $manager->flush();
    }
}
