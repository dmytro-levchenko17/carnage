<?php

namespace App\Entity;

use App\Repository\WeaponsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeaponsRepository::class)
 */
class Weapons
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
    private $weapon_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $weapon_damage;

    /**
     * @ORM\Column(type="integer")
     */
    private $weapon_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeaponName(): ?string
    {
        return $this->weapon_name;
    }

    public function setWeaponName(string $weapon_name): self
    {
        $this->weapon_name = $weapon_name;

        return $this;
    }

    public function getWeaponDamage(): ?int
    {
        return $this->weapon_damage;
    }

    public function setWeaponDamage(int $weapon_damage): self
    {
        $this->weapon_damage = $weapon_damage;

        return $this;
    }

    public function getWeaponPrice(): ?int
    {
        return $this->weapon_price;
    }

    public function setWeaponPrice(int $weapon_price): self
    {
        $this->weapon_price = $weapon_price;

        return $this;
    }
}
