<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @OneToOne(targetEntity="User", inversedBy="characters")
     * @JoinColumn(name="character_id", referencedColumnName="id")
     */
    private User $user;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $level = null;

   /**
     * @ORM\Column(type="integer")
     */
    private ?int $experience = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $max_health = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $max_stamina = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $money = null;

    /**
     * @OneToOne(targetEntity="User", mappedBy="characters")
     */
    private $characteristic;

    /**
     * @ManyToMany(targetEntity="Weapon")
     * @JoinTable(name="characters_weapons",
     *      joinColumns={@JoinColumn(name="character_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="weapon_id", referencedColumnName="id")}
     * )
     */
    private $weapons;

    /**
     * @ManyToMany(targetEntity="Armor")
     * @JoinTable(name="characters_armors",
     *      joinColumns={@JoinColumn(name="character_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="armor_id", referencedColumnName="id")}
     * )
     */
    private $armors;

    public function __construct()
    {
        $this->weapons = new ArrayCollection();
        $this->armors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getMaxHealth(): ?int
    {
        return $this->max_health;
    }

    public function setMaxHealth(int $max_health): self
    {
        $this->max_health = $max_health;

        return $this;
    }

    public function getMaxStamina(): ?int
    {
        return $this->max_stamina;
    }

    public function setMaxStamina(int $max_stamina): self
    {
        $this->max_stamina = $max_stamina;

        return $this;
    }

    public function getMoney(): ?int
    {
        return $this->money;
    }

    public function setMoney(int $money): self
    {
        $this->money = $money;

        return $this;
    }

    public function getCharacteristic(): ?Characteristic
    {
        return $this->characteristic;
    }

    public function setCharacteristic(Characteristic $characteristic): self
    {
        // set the owning side of the relation if necessary
        if ($characteristic->getCharacters() !== $this) {
            $characteristic->setCharacters($this);
        }

        $this->characteristic = $characteristic;

        return $this;
    }

    /**
     * @return Collection|Weapons[]
     */
    public function getWeapons(): Collection
    {
        return $this->weapons;
    }

    public function addWeapon(Weapons $weapon): self
    {
        if (!$this->weapons->contains($weapon)) {
            $this->weapons[] = $weapon;
        }

        return $this;
    }

    public function removeWeapon(Weapons $weapon): self
    {
        $this->weapons->removeElement($weapon);

        return $this;
    }

    /**
     * @return Collection|Armor[]
     */
    public function getArmors(): Collection
    {
        return $this->armors;
    }

    public function addArmor(Armor $armor): self
    {
        if (!$this->armors->contains($armor)) {
            $this->armors[] = $armor;
        }

        return $this;
    }

    public function removeArmor(Armor $armor): self
    {
        $this->armors->removeElement($armor);

        return $this;
    }
}
