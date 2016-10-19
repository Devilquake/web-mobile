<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserHabits
 *
 * @ORM\Table(name="user_current_habits")
 * @ORM\Entity
 */
class UserCurrentHabits
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
     * @ORM\ManyToOne(targetEntity="user", inversedBy="userCurrentHabits")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="userHabits", inversedBy="userCurrentHabits")
     * @ORM\JoinColumn(name="user_habit_id", referencedColumnName="id")
     */
    private $userHabitId;



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
     * @return UserCurrentHabits
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
     * Set userHabitId
     *
     * @param integer $userHabitId
     *
     * @return UserCurrentHabits
     */
    public function setUserHabitId($userHabitId)
    {
        $this->userHabitId = $userHabitId;

        return $this;
    }

    /**
     * Get userHabitId
     *
     * @return integer
     */
    public function getUserHabitId()
    {
        return $this->userHabitId;
    }
}
