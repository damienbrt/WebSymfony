<?php

namespace App\Entity;

use App\Repository\TimeSlotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimeSlotRepository::class)
 */
class TimeSlot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_begin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_end;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $planning_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBegin(): ?\DateTimeInterface
    {
        return $this->date_begin;
    }

    public function setDateBegin(\DateTimeInterface $date_begin): self
    {
        $this->date_begin = $date_begin;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getPlanningType(): ?string
    {
        return $this->planning_type;
    }

    public function setPlanningType(string $planning_type): self
    {
        $this->planning_type = $planning_type;

        return $this;
    }
}
