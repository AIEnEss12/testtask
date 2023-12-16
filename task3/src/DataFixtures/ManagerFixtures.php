<?php

namespace App\DataFixtures;

use App\Entity\Manager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ManagerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('ru_RU');

        for ($i = 1; $i <= 10; $i++) {
            $managerEntity = new Manager();
            $managerEntity->setFirstName($faker->firstName);
            $managerEntity->setLastName($faker->lastName);
            $managerEntity->setBirthdate($faker->date('Y-m-d'));
            $manager->persist($managerEntity);
            $this->addReference('manager_'.$i, $managerEntity);
        }

        $manager->flush();
    }
}
