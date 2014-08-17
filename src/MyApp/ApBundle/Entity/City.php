<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class City
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
    private $city;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $description;

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
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
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
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add client
     *
     * @param MyApp\ApBundle\Entity\Client $client
     */
    public function addClient(\MyApp\ApBundle\Entity\Client $client)
    {
        $this->client[] = $client;
    }

    /**
     * Get client
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClient()
    {
        return $this->client;
    }
}