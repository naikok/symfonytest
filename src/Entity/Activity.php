<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use DateTimeInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="activity")
 *
 */
class Activity
{
    /**
     * @ORM\Column(type="integer", name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="activity")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="title", length=64, type="string", nullable=false)
     */

    private $title;


    /**
     * @ORM\Column(type="datetime", name="start_date", nullable=false)
     */
    private $startDate;


    /**
     * @ORM\Column(type="float", name="price", nullable=false)
     */
    private $price;


    /**
     * @ORM\Column(type="datetime", name="end_date", nullable=false)
     */
    private $endDate;

    /**
     * @ORM\Column(type="integer", name="popularity", nullable=false)
     */
    private $popularity;


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
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * @return float $price
     *
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return void
     */
    public function setPrice(float $price) : void
    {
        $this->price = $price;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate() : DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface $startDate
     */
    public function setStartDate(DateTimeInterface $startDate) : void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate() : DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     * @return void
     */
    public function setEndDate(DateTimeInterface $endDate) : void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getPopularity() : int
    {
        return $this->popularity;
    }

    /**
     * @param int $popularity
     * @return void
     */
    public function setPopularity(int $popularity)
    {
        $this->popularity = $popularity;
    }

}

