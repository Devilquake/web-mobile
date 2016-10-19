<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Results
 *
 * @ORM\Table(name="results")
 * @ORM\Entity
 */
class Results
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     *
     * @Assert\Type("integer")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_habits_id", type="integer", nullable=false)
     *
     * @Assert\Type("integer")
     */
    private $userHabitsId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_1", type="boolean", nullable=false)
     *
     * @Assert\Type("bool")
     */
    private $habit1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_2", type="boolean", nullable=false)
     *
     * @Assert\Type("bool")
     */
    private $habit2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_3", type="boolean", nullable=false)
     *
     * @Assert\Type("bool")
     */
    private $habit3;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer", nullable=false)
     *
     * @Assert\Type("integer")
     */
    private $calories;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     *
     * @Assert\Type("integer")
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     *
     * @Assert\DateTime()
     */
    private $createdAt;



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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Results
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userId
     *
     * @param integer $userHabitsId
     *
     * @return Results
     */
    public function setUserHabitsId($userHabitsId)
    {
        $this->userHabitsId = $userHabitsId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserHabitsId()
    {
        return $this->userHabitsId;
    }

    /**
     * Set habit1
     *
     * @param boolean $habit1
     *
     * @return Results
     */
    public function setHabit1($habit1)
    {
        $this->habit1 = $habit1;

        return $this;
    }

    /**
     * Get habit1
     *
     * @return boolean
     */
    public function getHabit1()
    {
        return $this->habit1;
    }

    /**
     * Set habit2
     *
     * @param boolean $habit2
     *
     * @return Results
     */
    public function setHabit2($habit2)
    {
        $this->habit2 = $habit2;

        return $this;
    }

    /**
     * Get habit2
     *
     * @return boolean
     */
    public function getHabit2()
    {
        return $this->habit2;
    }

    /**
     * Set habit3
     *
     * @param boolean $habit3
     *
     * @return Results
     */
    public function setHabit3($habit3)
    {
        $this->habit3 = $habit3;

        return $this;
    }

    /**
     * Get habit3
     *
     * @return boolean
     */
    public function getHabit3()
    {
        return $this->habit3;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     *
     * @return Results
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return integer
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Results
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Results
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
