<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date1;

    /**
     * @ORM\Column(type="date")
     */
    private $date2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Room::class, inversedBy="reservations")
     */
    private $room;

    public function __construct()
    {
        $this->room = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate1(): ?\DateTimeInterface
    {
        return $this->date1;
    }

    public function setDate1(\DateTimeInterface $date1): self
    {
        $this->date1 = $date1;

        return $this;
    }

    public function getDate2(): ?\DateTimeInterface
    {
        return $this->date2;
    }

    public function setDate2(\DateTimeInterface $date2): self
    {
        $this->date2 = $date2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Room[]
     */
    public function getRoom(): Collection
    {
        return $this->room;
    }

    public function addRoom(Room $room): self
    {
        if (!$this->room->contains($room)) {
            $this->room[] = $room;
        }

        return $this;
    }

    public function removeRoom(Room $room): self
    {
        if ($this->room->contains($room)) {
            $this->room->removeElement($room);
        }

        return $this;
    }
}
