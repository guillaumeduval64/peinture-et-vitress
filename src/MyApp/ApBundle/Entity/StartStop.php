<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class StartStop
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
      /**
     * @ORM\Column(type="datetime", nullable=true)
     */    
    private $heureD;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */    
    private $heureF;
    
     /**
     * @ORM\ManyToOne(targetEntity="Production", inversedBy="startStop")
     */
    private $production;
    
     /**
     * @ORM\ManyToMany(targetEntity="Travailleur")
     */    
    public $travailleur;

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
     * Set heureD
     *
     * @param datetime $heureD
     */
    public function setHeureD($heureD)
    {
        $this->heureD = $heureD;
    }

    /**
     * Get heureD
     *
     * @return datetime 
     */
    public function getHeureD()
    {
        return $this->heureD;
    }

    /**
     * Set heureF
     *
     * @param datetime $heureF
     */
    public function setHeureF($heureF)
    {
        $this->heureF = $heureF;
    }

    /**
     * Get heureF
     *
     * @return datetime 
     */
    public function getHeureF()
    {
        return $this->heureF;
    }

    /**
     * Set production
     *
     * @param MyApp\ApBundle\Entity\Production $production
     */
    public function setProduction(\MyApp\ApBundle\Entity\Production $production)
    {
        $this->production = $production;
    }

    /**
     * Get production
     *
     * @return MyApp\ApBundle\Entity\Production 
     */
    public function getProduction()
    {
        return $this->production;
    }
    public function __construct()
    {
        $this->travailleur = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add travailleur
     *
     * @param MyApp\ApBundle\Entity\Travailleur $travailleur
     */
    public function addTravailleur(\MyApp\ApBundle\Entity\Travailleur $travailleur)
    {
        $this->travailleur[] = $travailleur;
    }

    /**
     * Get travailleur
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTravailleur()
    {
        return $this->travailleur;
    }

    /**
     * Remove travailleur
     *
     * @param \MyApp\ApBundle\Entity\Travailleur $travailleur
     */
    public function removeTravailleur(\MyApp\ApBundle\Entity\Travailleur $travailleur)
    {
        $this->travailleur->removeElement($travailleur);
    }
}