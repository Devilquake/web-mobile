<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHabits
 *
 * @ORM\Table(name="user-habits")
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


}

