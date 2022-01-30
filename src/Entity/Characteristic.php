<?php

namespace App\Entity;

use App\Repository\CharacteristicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacteristicRepository::class)
 */
class Characteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\Column(type="integer")
     */
    private $aligity;

    /**
     * @ORM\Column(type="integer")
     */
    private $instinct;

    /**
     * @ORM\Column(type="integer")
     */
    private $viability;

    /**
     * @OneToOne(targetEntity="Character", inversedBy="characteristic")
     * @JoinColumn(name="character_id", referencedColumnName="id")
     */
    private $characters;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getAligity(): ?int
    {
        return $this->aligity;
    }

    public function setAligity(int $aligity): self
    {
        $this->aligity = $aligity;

        return $this;
    }

    public function getInstinct(): ?int
    {
        return $this->instinct;
    }

    public function setInstinct(int $instinct): self
    {
        $this->instinct = $instinct;

        return $this;
    }

    public function getViability(): ?int
    {
        return $this->viability;
    }

    public function setViability(int $viability): self
    {
        $this->viability = $viability;

        return $this;
    }

    public function getCharacters(): ?Character
    {
        return $this->characters;
    }

    public function setCharacters(Character $characters): self
    {
        $this->characters = $characters;

        return $this;
    }
}
