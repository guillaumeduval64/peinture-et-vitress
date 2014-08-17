<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
* @ORM\Entity(repositoryClass="ContratRepository")
 * @UniqueEntity("numero")
 */
class Contrat
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    public $id;
    
    /**
     * @ORM\Column(type="string",length=255, unique=true)
     */    
    public $numero;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    public $contratEstimation;
    
     /**
     * @ORM\ManyToMany(targetEntity="ClientService", cascade={"persist","remove"})
     * @Assert\NotBlank()
     */    
    public $clientService;

    
     /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="contrat", cascade={"persist"})
     */    
    public $client;
    
     /**
     * @ORM\Column(type="date", nullable=true)
     */
    public $date;
    
     /**
     * @ORM\Column(type="date", nullable=true)
     */
    public $dateDepot;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    public $depot;
    
     /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;
    
     /**
     * @ORM\OneToOne(targetEntity="Production", cascade={"remove", "persist"})
     */    
    private $production;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
    public function __construct()
    {
        $this->clientService = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero
     *
     * @param string $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }    
    
    /**
     * Add clientService
     *
     * @param MyApp\ApBundle\Entity\ClientService $clientService
     */
    public function addClientService(\MyApp\ApBundle\Entity\ClientService $clientService)
    {
        $this->clientService[] = $clientService;
    }

    /**
     * Get clientService
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClientService()
    {
        return $this->clientService;
    }
    
    public function removeGroup($clientService)
    {
        return $this->clientService->removeElement($clientService);
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
     * Set contratEstimation
     *
     * @param string $contratEstimation
     */
    public function setContratEstimation($contratEstimation)
    {
        $this->contratEstimation = $contratEstimation;
    }

    /**
     * Get contratEstimation
     *
     * @return string 
     */
    public function getContratEstimation()
    {
        return $this->contratEstimation;
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

    /**
     * Set dateDepot
     *
     * @param date $dateDepot
     */
    public function setDateDepot($dateDepot)
    {
        $this->dateDepot = $dateDepot;
    }

    /**
     * Get dateDepot
     *
     * @return date 
     */
    public function getDateDepot()
    {
        return $this->dateDepot;
    }

    /**
     * Set depot
     *
     * @param string $depot
     */
    public function setDepot($depot)
    {
        $this->depot = $depot;
    }

    /**
     * Get depot
     *
     * @return string 
     */
    public function getDepot()
    {
        return $this->depot;
    }

    /**
     * Set dateTable
     *
     * @param \MyApp\ApBundle\Entity\DateTable $dateTable
     * @return Contrat
     */
    public function setDateTable(\MyApp\ApBundle\Entity\DateTable $dateTable = null)
    {
        $this->dateTable = $dateTable;
    
        return $this;
    }

    /**
     * Get dateTable
     *
     * @return \MyApp\ApBundle\Entity\DateTable 
     */
    public function getDateTable()
    {
        return $this->dateTable;
    }

    /**
     * Remove clientService
     *
     * @param \MyApp\ApBundle\Entity\ClientService $clientService
     */
    public function removeClientService(\MyApp\ApBundle\Entity\ClientService $clientService)
    {
        $this->clientService->removeElement($clientService);
    }
}