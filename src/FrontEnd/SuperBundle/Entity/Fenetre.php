<?php
namespace FrontEnd\SuperBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Fenetre
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     * @Assert\NotBlank()
     */    
    private $type;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $nombre;
    
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $description;

    /**
    * @ORM\ManyToOne(targetEntity="Devis", inversedBy="fenetres", cascade={"all"})
    * @ORM\JoinColumn(name="devis_id", referencedColumnName="id")
     */    
      private $devis;

       /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fenetres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     * @return Fenetre
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

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Fenetre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Fenetre
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
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

    /**
     * Set devis
     *
     * @param \Sdz\BlogBundle\Entity\Devis $devis
     * @return Fenetre
     */
    public function setDevis(\FrontEnd\SuperBundle\Entity\Devis $devis)
    {
        $this->devis = $devis;
    
        return $this;
    }

    /**
     * Get devis
     *
     * @return \Sdz\BlogBundle\Entity\Devis 
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Fenetre
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
     * @return Fenetre
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
}