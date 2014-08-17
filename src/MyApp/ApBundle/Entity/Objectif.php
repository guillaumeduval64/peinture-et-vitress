<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ObjectifRepository")
 */
class Objectif
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\OneToMany(targetEntity="ObjectifSemaine", mappedBy="Objectif", cascade={"persist","remove"})
     */    
    private $objectifSemaine;

    /**
     * @ORM\Column(type="string",length=255)
     */    
    private $contratMoyen;

    /**
     * @ORM\Column(type="string",length=255)
     */    
    public $nbContrat;

    /**
     * @ORM\Column(type="string",length=255)
     */    
    private $année;
    
     /**
     * @ORM\OneToOne(targetEntity="MyApp\UtilisateurBundle\Entity\Utilisateur", cascade={"remove", "persist"})
     */    
    private $utilisateur;

     /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
    public function __construct()
    {
        $this->titles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
        $this->nbContrat = 10;
    }
    

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
     * Set created
     *
     * @param \DateTime $created
     * @return Objectif
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Objectif
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set utilisateur
     *
     * @param \MyApp\UtilisateurBundle\Entity\Utilisateur $utilisateur
     * @return Objectif
     */
    public function setUtilisateur(\MyApp\UtilisateurBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \MyApp\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set année
     *
     * @param string $année
     * @return Objectif
     */
    public function setAnnée($année)
    {
        $this->année = $année;
    
        return $this;
    }

    /**
     * Get année
     *
     * @return string 
     */
    public function getAnnée()
    {
        return $this->année;
    }

    /**
     * Add objectifSemaine
     *
     * @param \MyApp\ApBundle\Entity\ObjectifSemaine $objectifSemaine
     * @return Objectif
     */
    public function addObjectifSemaine(\MyApp\ApBundle\Entity\ObjectifSemaine $objectifSemaine)
    {
        $this->objectifSemaine[] = $objectifSemaine;
    
        return $this;
    }

    /**
     * Remove objectifSemaine
     *
     * @param \MyApp\ApBundle\Entity\ObjectifSemaine $objectifSemaine
     */
    public function removeObjectifSemaine(\MyApp\ApBundle\Entity\ObjectifSemaine $objectifSemaine)
    {
        $this->objectifSemaine->removeElement($objectifSemaine);
    }

    /**
     * Get objectifSemaine
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObjectifSemaine()
    {
        return $this->objectifSemaine;
    }

    /**
     * Set contratMoyen
     *
     * @param string $contratMoyen
     * @return Objectif
     */
    public function setContratMoyen($contratMoyen)
    {
        $this->contratMoyen = $contratMoyen;
    
        return $this;
    }

    /**
     * Get contratMoyen
     *
     * @return string 
     */
    public function getContratMoyen()
    {
        return $this->contratMoyen;
    }

    /**
     * Set nbContrat
     *
     * @param string $nbContrat
     * @return Objectif
     */
    public function setNbContrat($nbContrat)
    {
        $this->nbContrat = $nbContrat;
    
        return $this;
    }

    /**
     * Get nbContrat
     *
     * @return string 
     */
    public function getNbContrat()
    {
        return $this->nbContrat;
    }
}