<?php
namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Booking;
use App\Service\BookingService;


class TransformerServiceTest extends WebTestCase
{

    /**
     *
     * @covers \App\Service\BookingService::save
     */
    public function testFindByAllActiveSubscriptions()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $container = self::$container;
        $activityService  = self::$container->get('App\Service\ActivityService');

        $transformerService = self::$container->get('App\Service\Transformer\TransformerService');
        $date = new \DateTime('2020-05-21 14:00:00');
        $people = 5;
        $result = $activityService->getAvailableActivities($date, $people);

        $this->assertNotEmpty($result);
        $this->assertIsArray($result);
        $arrayTransformed = $transformerService->transform($result);
        $this->assertIsArray($arrayTransformed);
        $this->assertNotEmpty($arrayTransformed);
        foreach($arrayTransformed as $object) {
            $this->assertTrue($object instanceof \stdClass);
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

}