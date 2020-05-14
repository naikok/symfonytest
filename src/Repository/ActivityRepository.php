<?php
namespace App\Repository;

use App\Entity\Activity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function getActivitiesFromDate(\DateTime $date, int $people) : array
    {

        $activities = $this->createQueryBuilder('a')
            ->andWhere(':date BETWEEN a.startDate AND a.endDate')
            ->setParameter(':date', $date)
            ->orderBy('a.popularity', 'DESC')
            ->getQuery()
            ->getResult();

        if (is_array($activities) && !empty($activities)){

            foreach($activities as $activity){
                $newPrice =  round($activity->getPrice()  * $people,2);
                $activity->setPrice($newPrice);
            }

        }

        return $activities;
    }
}