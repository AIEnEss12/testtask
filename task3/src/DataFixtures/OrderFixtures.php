<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 50; $i++) {
            $order = new Order();
            $order->setName('Order' . $i);

            $managerReference = $this->getReference('manager_' . rand(1, 10));
            $order->setManager($managerReference);
            $manager->persist($order);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ManagerFixtures::class,
        ];
    }
}
