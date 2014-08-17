<?php

namespace MyApp\UtilisateurBundle\Entity;

use FOS\UserBundle\Entity\Group as BaseGroup;
use FOS\UserBundle\Model\GroupableInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
     protected $id;

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
     * Set utilisateur
     *
     * @param \MyApp\UtilisateurBundle\Entity\Group $utilisateur
     * @return Group
     */
    public function setUtilisateur(\MyApp\UtilisateurBundle\Entity\Groups $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \MyApp\UtilisateurBundle\Entity\Group 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}