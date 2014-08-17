<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Comptabilite
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @Assert\NotBlank()
     */    
    private $type;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $montant;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $paiement;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $bilan;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="Production", inversedBy="production", cascade={"persist","remove"})
     */    
    private $production;
    
     /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $date;
    
     /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
     /**
     * @ORM\Column(type="string",length=255)
     */
    protected $user;
    
    public function __construct()
    {
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
     * Set montant
     *
     * @param string $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
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

    /**
     * Set type
     *
     * @param MyApp\ApBundle\Entity\Type $type
     */
    public function setType(\MyApp\ApBundle\Entity\Type $type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return MyApp\ApBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
    }

    /**
     * Get paiement
     *
     * @return string 
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set user
     *
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set bilan
     *
     * @param string $bilan
     */
    public function setBilan($bilan)
    {
        $this->bilan = $bilan;
    }

    /**
     * Get bilan
     *
     * @return string 
     */
    public function getBilan()
    {
        return $this->bilan;
    }

    /**
     * Set note
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set dateTable
     *
     * @param MyApp\ApBundle\Entity\DateTable $dateTable
     */
    public function setDateTable(\MyApp\ApBundle\Entity\DateTable $dateTable)
    {
        $this->dateTable = $dateTable;
    }

    /**
     * Get dateTable
     *
     * @return MyApp\ApBundle\Entity\DateTable 
     */
    public function getDateTable()
    {
        return $this->dateTable;
    }

    /**
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }
}