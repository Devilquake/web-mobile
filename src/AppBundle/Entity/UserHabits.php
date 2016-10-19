<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserHabits
 *
 * @ORM\Table(name="user_habits")
 * @ORM\Entity
 */
class UserHabits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\OneToMany(targetEntity="userCurrentHabits", mappedBy="userHabits")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 100
     * )
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="habits", inversedBy="user_habits")
     * @ORM\JoinColumn(name="habit_1", referencedColumnName="id")
     */
    private $habit1;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="habits", inversedBy="user_habits")
     * @ORM\JoinColumn(name="habit_2", referencedColumnName="id")
     */
    private $habit2;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="habits", inversedBy="user_habits")
     * @ORM\JoinColumn(name="habit_3", referencedColumnName="id")
     */
    private $habit3;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserHabits
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set habit1
     *
     * @param integer $habit1
     *
     * @return UserHabits
     */
    public function setHabit1($habit1)
    {
        $this->habit1 = $habit1;

        return $this;
    }

    /**
     * Get habit1
     *
     * @return integer
     */
    public function getHabit1()
    {
        return $this->habit1;
    }

    /**
     * Set habit2
     *
     * @param integer $habit2
     *
     * @return UserHabits
     */
    public function setHabit2($habit2)
    {
        $this->habit2 = $habit2;

        return $this;
    }

    /**
     * Get habit2
     *
     * @return integer
     */
    public function getHabit2()
    {
        return $this->habit2;
    }

    /**
     * Set habit3
     *
     * @param integer $habit3
     *
     * @return UserHabits
     */
    public function setHabit3($habit3)
    {
        $this->habit3 = $habit3;

        return $this;
    }

    /**
     * Get habit3
     *
     * @return integer
     */
    public function getHabit3()
    {
        return $this->habit3;
    }
}
