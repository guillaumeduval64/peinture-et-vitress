<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class ClientService
{ 
    
     /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\ManyToOne(targetEntity="Client", cascade={"persist","remove"})
     */    
    private $client;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;
    
     /**
     * @ORM\ManyToOne(targetEntity="Service", cascade={"persist","remove"})
     */    
    private $service;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $prix;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $note;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
     /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist"})
     */
    private $image;
    
    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());

     
    }

    public function getServiceCreated()
    {
            return $this->created->format('d-m-Y').': '.$this->service->getDescription().': '.$this->prix.'$';
                    
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
     * Set prix
     *
     * @param string $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
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
     * Set service
     *
     * @param MyApp\ApBundle\Entity\Service $service
     */
    public function setService(\MyApp\ApBundle\Entity\Service $service)
    {
        $this->service = $service;
    }

    /**
     * Get service
     *
     * @return MyApp\ApBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Add contrat
     *
     * @param MyApp\ApBundle\Entity\Contrat $contrat
     */
    public function addContrat(\MyApp\ApBundle\Entity\Contrat $contrat)
    {
        $this->contrat[] = $contrat;
    }

    /**
     * Get contrat
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContrat()
    {
        return $this->contrat;
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
     * Set image
     *
     * @param \MyApp\ApBundle\Entity\Image $image
     * @return ClientService
     */
    public function setImage(\MyApp\ApBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \MyApp\ApBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}