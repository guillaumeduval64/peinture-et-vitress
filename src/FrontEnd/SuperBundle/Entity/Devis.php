<?php
namespace FrontEnd\SuperBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Devis
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
    private $nom;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $prenom;
    
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $cellulaire;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $email;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $houseType;


    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $intExt;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $houseTypeFloors;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $basement;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $houseTypeFloorsAppart;

    /**
    * @ORM\OneToMany(targetEntity="Fenetre", mappedBy="devis", cascade={"all"})
    */
    private $fenetres;

     /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $prix;

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
     * Set nom
     *
     * @param string $nom
     * @return Devis
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Devis
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cellulaire
     *
     * @param string $cellulaire
     * @return Devis
     */
    public function setCellulaire($cellulaire)
    {
        $this->cellulaire = $cellulaire;
    
        return $this;
    }

    /**
     * Get cellulaire
     *
     * @return string 
     */
    public function getCellulaire()
    {
        return $this->cellulaire;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Devis
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set houseType
     *
     * @param string $houseType
     * @return Devis
     */
    public function setHouseType($houseType)
    {
        $this->houseType = $houseType;
    
        return $this;
    }

    /**
     * Get houseType
     *
     * @return string 
     */
    public function getHouseType()
    {
        return $this->houseType;
    }

    /**
     * Set houseTypeFloors
     *
     * @param string $houseTypeFloors
     * @return Devis
     */
    public function setHouseTypeFloors($houseTypeFloors)
    {
        $this->houseTypeFloors = $houseTypeFloors;
    
        return $this;
    }

    /**
     * Get houseTypeFloors
     *
     * @return string 
     */
    public function getHouseTypeFloors()
    {
        return $this->houseTypeFloors;
    }

    /**
     * Set basement
     *
     * @param string $basement
     * @return Devis
     */
    public function setBasement($basement)
    {
        $this->basement = $basement;
    
        return $this;
    }

    /**
     * Get basement
     *
     * @return string 
     */
    public function getBasement()
    {
        return $this->basement;
    }

    /**
     * Set houseTypeFloorsAppart
     *
     * @param string $houseTypeFloorsAppart
     * @return Devis
     */
    public function setHouseTypeFloorsAppart($houseTypeFloorsAppart)
    {
        $this->houseTypeFloorsAppart = $houseTypeFloorsAppart;
    
        return $this;
    }

    /**
     * Get houseTypeFloorsAppart
     *
     * @return string 
     */
    public function getHouseTypeFloorsAppart()
    {
        return $this->houseTypeFloorsAppart;
    }
    
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
     * Set created
     *
     * @param \DateTime $created
     * @return Devis
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
     * @return Devis
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
     * Add fenetres
     *
     * @param \FrontEnd\SuperBundle\Entity\Fenetre $fenetres
     * @return Devis
     */
    public function addFenetre(\FrontEnd\SuperBundle\Entity\Fenetre $fenetres)
    {
        $this->fenetres[] = $fenetres;
    
        return $this;
    }

    /**
     * Remove fenetres
     *
     * @param \FrontEnd\SuperBundle\Entity\Fenetre $fenetres
     */
    public function removeFenetre(\FrontEnd\SuperBundle\Entity\Fenetre $fenetres)
    {
        $this->fenetres->removeElement($fenetres);
    }

    /**
     * Get fenetres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFenetres()
    {
        return $this->fenetres;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Devis
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
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
     * Set intExt
     *
     * @param string $intExt
     * @return Devis
     */
    public function setIntExt($intExt)
    {
        $this->intExt = $intExt;
    
        return $this;
    }

    /**
     * Get intExt
     *
     * @return string 
     */
    public function getIntExt()
    {
        return $this->intExt;
    }
}