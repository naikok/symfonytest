<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use DateTimeInterface;
use Faker\Provider\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 *
 */
class Booking
{
    /**
     * @ORM\Column(type="integer", name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="id_activity", type="integer", nullable=false)
     *
     *
     */

    private $idActivity;

    /**
     * @ORM\Column(type="integer", name="people", nullable=false)
     */
    private $people;


    /**
     * @ORM\Column(type="datetime", name="activity_date", nullable=false)
     */
    private $activityDate;


    /**
     * @ORM\Column(type="datetime", name="created_at", nullable=false)
     */
    private $createdAt;


    /**
     * @ORM\Column(type="float", name="total_price", nullable=false)
     */
    private $totalPrice;


    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdActivity()
    {
        return $this->idActivity;
    }

    /**
     * @param mixed $idActivity
     */
    public function setIdActivity($idActivity)
    {
        $this->idActivity = $idActivity;
    }

    /**
     * @return int
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * @param  $people
     */
    public function setPeople(int $people) : void
    {
        $this->people = $people;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt) : void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getActivityDate()
    {
        return $this->activityDate;
    }

    /**
     * @param \DateTime $activityDate
     */
    public function setActivityDate(\DateTime $activityDate) : void
    {
        $this->activityDate = $activityDate;
    }

    /**
     * @return float
     */
    public function getTotalPrice() : float
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice(float $totalPrice) : void
    {
        $this->totalPrice = $totalPrice;
    }

}

