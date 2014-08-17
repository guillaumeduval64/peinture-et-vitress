<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ObjectifSemaineRepository")
 */
class ObjectifSemaine
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="Objectif", inversedBy="objectifSemaine", cascade={"persist"})
     * @ORM\JoinColumn(name="objectif_id", referencedColumnName="id")
     */    
    public $objectif;

    /**
     * @ORM\Column(type="string",length=255)
     */    
    private $year;

     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $month;

         /**
     * @ORM\Column(type="string",length=255)
     */    
    private $week;

     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $valeur;

         /**
     * @ORM\Column(type="string",length=255)
     */    
    private $type;

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
     * @return ObjectifSemaine
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
     * @return ObjectifSemaine
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
     * Add valeur
     *
     * @param \MyApp\ApBundle\Entity\ObjectifSemaine $valeur
     * @return ObjectifSemaine
     */
    public function addValeur(\MyApp\ApBundle\Entity\ObjectifSemaine $valeur)
    {
        $this->valeur[] = $valeur;
    
        return $this;
    }

    /**
     * Remove valeur
     *
     * @param \MyApp\ApBundle\Entity\ObjectifSemaine $valeur
     */
    public function removeValeur(\MyApp\ApBundle\Entity\ObjectifSemaine $valeur)
    {
        $this->valeur->removeElement($valeur);
    }

    /**
     * Get valeur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return ObjectifSemaine
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Set objectif
     *
     * @param \MyApp\ApBundle\Entity\Objectif $objectif
     * @return ObjectifSemaine
     */
    public function setObjectif(\MyApp\ApBundle\Entity\Objectif $objectif = null)
    {
        $this->objectif = $objectif;
    
        return $this;
    }

    /**
     * Get objectif
     *
     * @return \MyApp\ApBundle\Entity\Objectif 
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set month
     *
     * @param string $month
     * @return ObjectifSemaine
     */
    public function setMonth($month)
    {
        $this->month = $month;
    
        return $this;
    }

    /**
     * Get month
     *
     * @return string 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set week
     *
     * @param string $week
     * @return ObjectifSemaine
     */
    public function setWeek($week)
    {
        $this->week = $week;
    
        return $this;
    }

    /**
     * Get week
     *
     * @return string 
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return ObjectifSemaine
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ObjectifSemaine
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}