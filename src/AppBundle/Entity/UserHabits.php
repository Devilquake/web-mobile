<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="habit_1", type="integer", nullable=false)
     */
    private $habit1;

    /**
     * @var integer
     *
     * @ORM\Column(name="habit_2", type="integer", nullable=false)
     */
    private $habit2;

    /**
     * @var integer
     *
     * @ORM\Column(name="habit_3", type="integer", nullable=false)
     */
    private $habit3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;



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
     * @return UserHabits
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return UserHabits
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return UserHabits
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
