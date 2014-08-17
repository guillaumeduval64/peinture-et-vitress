<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 */
class Production
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string",length=255, nullable = true)
     */    
    private $period;

    /**
     * @ORM\Column(type="string",length=255, nullable = true)
     */    
    public $previsionDateProd;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $statut;
    
     /**
     * @ORM\Column(type="date", nullable=true)
     */    
    private $dateProd;
    
     /**
     * @ORM\Column(type="time", nullable = true)
     */    
    private $previsionHeureD;
    
     /**
     * @ORM\Column(type="time", nullable = true)
     */    
    private $previsionHeureF;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     */    
    private $heureD;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */    
    private $heureF;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $contratCree;
    
     /**
     * @ORM\OneToMany(targetEntity="StartStop", mappedBy="production", cascade={"persist","remove"})
     */    
    private $startStop;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Client", cascade={"persist","remove"})
     */    
    private $client;
     
     /**
     * @ORM\OneToOne(targetEntity="Satisfaction")
     */    
    private $satisfaction;
    
     /**
     * @ORM\OneToOne(targetEntity="SatisfactionEquipe")
     */    
    private $satisfactionEquipe;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;
    
     /**
     * @ORM\Column(type="string",length=255, nullable = true)
     */    
    private $note;
    
     /**
     * @ORM\OneToMany(targetEntity="Comptabilite", mappedBy="production", cascade={"persist","remove"})
     */    
    private $comptabilite;
    
     /**
     * @ORM\ManyToMany(targetEntity="Travailleur")
     */    
    public $travailleur;
    
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
     * Set period
     *
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * Get period
     *
     * @return string 
     */
    public function getPeriod()
    {
        return $this->period;
    }
   
    /**
     * Set previsionHeureD
     *
     * @param time $previsionHeureD
     */
    public function setPrevisionHeureD($previsionHeureD)
    {
        $this->previsionHeureD = $previsionHeureD;
    }

    /**
     * Get previsionHeureD
     *
     * @return time 
     */
    public function getPrevisionHeureD()
    {
        return $this->previsionHeureD;
    }

    /**
     * Set previsionHeureF
     *
     * @param time $previsionHeureF
     */
    public function setPrevisionHeureF($previsionHeureF)
    {
        $this->previsionHeureF = $previsionHeureF;
    }

    /**
     * Get previsionHeureF
     *
     * @return time 
     */
    public function getPrevisionHeureF()
    {
        return $this->previsionHeureF;
    }

    /**
     * Set heureD
     *
     * @param time $heureD
     */
    public function setHeureD($heureD)
    {
        $this->heureD = $heureD;
    }

    /**
     * Get heureD
     *
     * @return time 
     */
    public function getHeureD()
    {
        return $this->heureD;
    }

    /**
     * Set heureF
     *
     * @param time $heureF
     */
    public function setHeureF($heureF)
    {
        $this->heureF = $heureF;
    }

    /**
     * Get heureF
     *
     * @return time 
     */
    public function getHeureF()
    {
        return $this->heureF;
    }

    /**
     * Set client
     *
     * @param MyApp\ApBundle\Entity\Client $client
     */
    public function setClient(\MyApp\ApBundle\Entity\Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get client
     *
     * @return MyApp\ApBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
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
     * Set satisfaction
     *
     * @param MyApp\ApBundle\Entity\Satisfaction $satisfaction
     */
    public function setSatisfaction(\MyApp\ApBundle\Entity\Satisfaction $satisfaction)
    {
        $this->satisfaction = $satisfaction;
    }

    /**
     * Get satisfaction
     *
     * @return MyApp\ApBundle\Entity\Satisfaction 
     */
    public function getSatisfaction()
    {
        return $this->satisfaction;
    }

    /**
     * Set previsionDateProd
     *
     * @param string $previsionDateProd
     */
    public function setPrevisionDateProd($previsionDateProd)
    {
        $this->previsionDateProd = $previsionDateProd;
    }

    /**
     * Get previsionDateProd
     *
     * @return string 
     */
    public function getPrevisionDateProd()
    {
        return $this->previsionDateProd;
    }

    /**
     * Set statut
     *
     * @param string $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
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
     * Set numeroContrat
     *
     * @param string $numeroContrat
     */
    public function setNumeroContrat($numeroContrat)
    {
        $this->numeroContrat = $numeroContrat;
    }

    /**
     * Get numeroContrat
     *
     * @return string 
     */
    public function getNumeroContrat()
    {
        return $this->numeroContrat;
    }

    /**
     * Add comptabilite
     *
     * @param MyApp\ApBundle\Entity\Comptabilite $comptabilite
     */
    public function addComptabilite(\MyApp\ApBundle\Entity\Comptabilite $comptabilite)
    {
        $this->comptabilite[] = $comptabilite;
    }

    /**
     * Get comptabilite
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComptabilite()
    {
        return $this->comptabilite;
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
     * Set dateProd
     *
     * @param date $dateProd
     */
    public function setDateProd($dateProd)
    {
        $this->dateProd = $dateProd;
    }

    /**
     * Get dateProd
     *
     * @return date 
     */
    public function getDateProd()
    {
        return $this->dateProd;
    }

    /**
     * Set satisfactionEquipe
     *
     * @param MyApp\ApBundle\Entity\SatisfactionEquipe $satisfactionEquipe
     */
    public function setSatisfactionEquipe(\MyApp\ApBundle\Entity\SatisfactionEquipe $satisfactionEquipe)
    {
        $this->satisfactionEquipe = $satisfactionEquipe;
    }

    /**
     * Get satisfactionEquipe
     *
     * @return MyApp\ApBundle\Entity\SatisfactionEquipe 
     */
    public function getSatisfactionEquipe()
    {
        return $this->satisfactionEquipe;
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
     * Add startStop
     *
     * @param MyApp\ApBundle\Entity\StartStop $startStop
     */
    public function addStartStop(\MyApp\ApBundle\Entity\StartStop $startStop)
    {
        $this->startStop[] = $startStop;
    }

    /**
     * Get startStop
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getStartStop()
    {
        return $this->startStop;
    }

    /**
     * Set contratCree
     *
     * @param string $contratCree
     */
    public function setContratCree($contratCree)
    {
        $this->contratCree = $contratCree;
    }

    /**
     * Get contratCree
     *
     * @return string 
     */
    public function getContratCree()
    {
        return $this->contratCree;
    }

    /**
     * Remove startStop
     *
     * @param \MyApp\ApBundle\Entity\StartStop $startStop
     */
    public function removeStartStop(\MyApp\ApBundle\Entity\StartStop $startStop)
    {
        $this->startStop->removeElement($startStop);
    }

    /**
     * Remove comptabilite
     *
     * @param \MyApp\ApBundle\Entity\Comptabilite $comptabilite
     */
    public function removeComptabilite(\MyApp\ApBundle\Entity\Comptabilite $comptabilite)
    {
        $this->comptabilite->removeElement($comptabilite);
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