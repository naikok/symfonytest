<?php
namespace App\Service;

use App\Entity\Activity;
use App\Entity\Booking;
use App\Repository\ActivityRepository;
use Doctrine\ORM\EntityManagerInterface;

class ActivityService
{
    protected $activityRepository;
    protected $entityManager;


    public function __construct(EntityManagerInterface $entityManager, ActivityRepository $bookingRepository)
    {
        $this->entityManager = $entityManager;
        $this->activityRepository = $bookingRepository;
    }

    /**
     * Get available activities depending on date
     * @param DatetimeInterface $searchDate
     * @param int $people
     * @return array
     *
     */

    public function getAvailableActivities(\DateTime $searchDate, int $people) : array
    {
        return $this->activityRepository->getActivitiesFromDate($searchDate,  $people);
    }

}