<?php

namespace MyApp\ApBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyApp\ApBundle\Entity\Group
 */
class Group
{
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}