<?php

namespace App\Entity;

use App\Repository\ArmorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmorRepository::class)
 */
class Armor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $armor_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $armor_strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $armor_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArmorName(): ?string
    {
        return $this->armor_name;
    }

    public function setArmorName(string $armor_name): self
    {
        $this->armor_name = $armor_name;

        return $this;
    }

    public function getArmorStrength(): ?int
    {
        return $this->armor_strength;
    }

    public function setArmorStrength(int $armor_strength): self
    {
        $this->armor_strength = $armor_strength;

        return $this;
    }

    public function getArmorPrice(): ?int
    {
        return $this->armor_price;
    }

    public function setArmorPrice(int $armor_price): self
    {
        $this->armor_price = $armor_price;

        return $this;
    }
}
