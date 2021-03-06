<?php
namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Activity;
use App\Service\ActivityService;


class ActivityServiceTest extends WebTestCase
{
    /**
     *
     * @covers \App\Service\ActivityService::getAvailableActivities
     */
    public function testFindByAllActiveSubscriptions()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $container = self::$container;
        $activityService  = self::$container->get('App\Service\ActivityService');
        $date = new \DateTime('2020-05-21 14:00:00');
        $people = 5;
        $result = $activityService->getAvailableActivities($date, $people);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertTrue(count($result) > 0);
        foreach ($result as $item) {
            $this->assertTrue($item instanceof Activity);
        }
    }

    protected function tearDown(): void
    {
       parent::tearDown();
    }

}

