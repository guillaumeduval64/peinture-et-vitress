<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Service
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */    
    private $type;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $description;
    
     /**
     * @ORM\OneToMany(targetEntity="ClientService", mappedBy="Service")
     */    
    private $ClientService;

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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function __construct()
    {
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ClientService
     *
     * @param MyApp\ApBundle\Entity\ClientService $clientService
     */
    public function addClientService(\MyApp\ApBundle\Entity\ClientService $clientService)
    {
        $this->ClientService[] = $clientService;
    }

    /**
     * Get ClientService
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClientService()
    {
        return $this->ClientService;
    }

    /**
     * Remove ClientService
     *
     * @param \MyApp\ApBundle\Entity\ClientService $clientService
     */
    public function removeClientService(\MyApp\ApBundle\Entity\ClientService $clientService)
    {
        $this->ClientService->removeElement($clientService);
    }
}