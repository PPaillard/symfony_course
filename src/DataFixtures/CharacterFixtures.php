<?php

namespace App\DataFixtures;

use App\Entity\Character;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CharacterFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $character = new Character();
            $character->setFirstname($faker->firstName());
            $character->setLastname($faker->lastName());
            $character->setBirthdate($faker->dateTime());
            $manager->persist($character);
        }
        $manager->flush();
    }
}
