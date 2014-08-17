<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ClientRepository")
 */
class Client
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $user;
    
         /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $ancien;
    
    /**
     * @ORM\Column(type="string",length=255)
     * 
     */    
    private $nom;

    /**
     * @ORM\Column(type="string",length=22, nullable=true)
     */    
    private $prenom;

        /**
     * @ORM\Column(type="string",length=22, nullable=true)
     */    
    private $phoneNumber;

        /**
     * @ORM\Column(type="string",length=22, nullable=true)
     */    
    private $phoneNumberCell;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $number;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $street;
    
     /**
     * @ORM\ManyToOne(targetEntity="City", cascade={"persist","remove"})
     */    
    private $city;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $pc;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $lat;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $lng;
   
     /**
     * @ORM\ManyToMany(targetEntity="Phone", cascade={"persist"})
     */    
    public $phones;
   
     /**
     * @ORM\Column(type="string",length=255)
     */ 
    private $etat;
    
     /**
     * @ORM\Column(type="boolean", nullable=true)
     */ 
    private $flag;
    
     /**
     * @ORM\ManyToOne(targetEntity="Service", cascade={"persist","remove"})
     * @Assert\NotBlank()
     */    
    private $service;
    
     /**
     * @ORM\OneToMany(targetEntity="Note", mappedBy="client", cascade={"persist","remove"})
     */    
    private $note;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $email;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;
    
     /**
     * @ORM\OneToMany(targetEntity="Contrat", mappedBy="client", cascade={"persist","remove"})
     */    
    private $contrat;
    
     /**
     * @ORM\ManyToMany(targetEntity="Titles")
     */    
    public $titles;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $date;
    
     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $heure;
    
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
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set street
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * Add titles
     *
     * @param MyApp\ApBundle\Entity\Titles $titles
     */
    public function addTitles(\MyApp\ApBundle\Entity\Titles $titles)
    {
        $this->titles[] = $titles;
    }

    /**
     * Get titles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * Set pc
     *
     * @param string $pc
     */
    public function setPc($pc)
    {
        $this->pc = $pc;
    }

    /**
     * Get pc
     *
     * @return string 
     */
    public function getPc()
    {
        return $this->pc;
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
     * Set city
     *
     * @param MyApp\ApBundle\Entity\City $city
     */
    public function setCity(\MyApp\ApBundle\Entity\City $city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return MyApp\ApBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add note
     *
     * @param MyApp\ApBundle\Entity\Note $note
     */
    
    /**
    * Set notes
    *
    * @param MyApp\ApBundle\Entity\Note $note
    */
    public function setDeskComment(\MyApp\ApBundle\Entity\Note $notes)
    {
        $this->notes = $notes;
    }
    
    public function setNote(\MyApp\ApBundle\Entity\Note $note)
    {
        $note->setClient($this);
    }

    /**
     * Get note
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Add note
     *
     * @param MyApp\ApBundle\Entity\Note $note
     */
    public function addNote(\MyApp\ApBundle\Entity\Note $note)
    {
        $this->note[] = $note;
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
     * Set ancien
     *
     * @param string $ancien
     */
    public function setAncien($ancien)
    {
        $this->ancien = $ancien;
    }

    /**
     * Get ancien
     *
     * @return string 
     */
    public function getAncien()
    {
        return $this->ancien;
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
     * Set heure
     *
     * @param datetime $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * Get heure
     *
     * @return datetime 
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set etat
     *
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Set lat
     *
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Remove note
     *
     * @param \MyApp\ApBundle\Entity\Note $note
     */
    public function removeNote(\MyApp\ApBundle\Entity\Note $note)
    {
        $this->note->removeElement($note);
    }

    /**
     * Remove contrat
     *
     * @param \MyApp\ApBundle\Entity\Contrat $contrat
     */
    public function removeContrat(\MyApp\ApBundle\Entity\Contrat $contrat)
    {
        $this->contrat->removeElement($contrat);
    }

    /**
     * Add titles
     *
     * @param \MyApp\ApBundle\Entity\Titles $titles
     * @return Client
     */
    public function addTitle(\MyApp\ApBundle\Entity\Titles $titles)
    {
        $this->titles[] = $titles;
    
        return $this;
    }

    /**
     * Remove titles
     *
     * @param \MyApp\ApBundle\Entity\Titles $titles
     */
    public function removeTitle(\MyApp\ApBundle\Entity\Titles $titles)
    {
        $this->titles->removeElement($titles);
    }

    /**
     * Add phones
     *
     * @param \MyApp\ApBundle\Entity\Phone $phones
     * @return Client
     */
    public function addPhone(\MyApp\ApBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;
    
        return $this;
    }

    /**
     * Remove phones
     *
     * @param \MyApp\ApBundle\Entity\Phone $phones
     */
    public function removePhone(\MyApp\ApBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set flag
     *
     * @param boolean $flag
     * @return Client
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    
        return $this;
    }

    /**
     * Get flag
     *
     * @return boolean 
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Client
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneNumberCell
     *
     * @param string $phoneNumberCell
     * @return Client
     */
    public function setPhoneNumberCell($phoneNumberCell)
    {
        $this->phoneNumberCell = $phoneNumberCell;
    
        return $this;
    }

    /**
     * Get phoneNumberCell
     *
     * @return string 
     */
    public function getPhoneNumberCell()
    {
        return $this->phoneNumberCell;
    }
}