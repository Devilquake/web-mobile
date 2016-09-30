<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_1", type="boolean", nullable=false)
     */
    private $habit1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_2", type="boolean", nullable=false)
     */
    private $habit2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_3", type="boolean", nullable=false)
     */
    private $habit3;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer", nullable=false)
     */
    private $calories;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

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

