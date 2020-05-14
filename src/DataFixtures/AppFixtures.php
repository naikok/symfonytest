<?php

namespace App\DataFixtures;
use Faker\Factory as FactoryFaker;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Activity;

class AppFixtures extends Fixture
{

    /*
     * Load Activities as example into database
     *
     */
    public function load(ObjectManager $manager)
    {

        $faker = FactoryFaker::create();

        for ($i = 0; $i < 20; $i++) {
            $activity = new Activity();
            $price = $faker->randomFloat(2,15,50);
            $activity->setPrice($price);
            $actividadTitle = "Act ".$faker->buildingNumber;
            $activity->setTitle($actividadTitle);
            $currentDateTime = time();
            $currentDate = new \DateTime();
            $currentDate->setTimestamp($currentDateTime);

            $randomDays = rand(7,20);
            $endDate = date('Y-m-d h:m:s',strtotime('+'.$randomDays.' days',time()));
            $endDateInt = strtotime($endDate);

            $endDateTime = new \DateTime();
            $endDateTime->setTimestamp($endDateInt);

            $activity->setStartDate($currentDate);
            $activity->setEndDate($endDateTime);

            $activity->setPopularity(rand(1,10));
            $manager->persist($activity);
        }

        $manager->flush();
    }
}
