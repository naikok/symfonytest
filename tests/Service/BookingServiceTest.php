<?php
namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Booking;
use App\Service\BookingService;


class BookingServiceTest extends WebTestCase
{
    private function createBookingEntity()
    {
        $booking = new Booking();
        $booking->setIdActivity(2);
        $booking->setTotalPrice(60);
        $booking->setPeople(2);
        $dateActivity = new \DateTime();
        $dateActivityTime= strtotime("2020-05-19 14:00:00");
        $dateActivity->setTimestamp($dateActivityTime);
        $currentTime = time();
        $currentDate = new \DateTime();
        $currentDate->setTimestamp($currentTime);
        $booking->setActivityDate($dateActivity);
        $booking->setCreatedAt($currentDate);

        return $booking;
    }

    /**
     *
     * @covers \App\Service\BookingService::save
     */
    public function testFindByAllActiveSubscriptions()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $container = self::$container;
        $bookingService  = self::$container->get('App\Service\BookingService');
        $booking = $this->createBookingEntity();
        $this->assertTrue($bookingService->save($booking));
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

}