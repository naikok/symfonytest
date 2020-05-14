<?php
namespace App\Service;

use App\Entity\Booking;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;

class BookingService
{
    protected $bookingRepository;
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager, BookingRepository $bookingRepository)
    {
        $this->entityManager = $entityManager;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Save a booking into database
     * @param Booking booking of type Entity
     * @
     * @return bool
     */

    public function save(Booking $booking) : bool
    {
        try {
            $this->entityManager->persist($booking);
            $this->entityManager->flush();
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }

}