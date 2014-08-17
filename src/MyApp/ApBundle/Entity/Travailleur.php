<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Travailleur
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
    /**
     * @ORM\Column(type="string",length=255)
     */    
    private $nom;
    
    /**
    /**
     * @ORM\Column(type="string",length=255)
     */    
    private $prenom;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $cell;

     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $nas;
    
        
     /**
     * @ORM\ManyToOne(targetEntity="\MyApp\utilisateurBundle\Entity\Utilisateur", cascade={"persist"})
     */    
    private $utilisateur;
    
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
     * Set cell
     *
     * @param string $cell
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
    }

    /**
     * Get cell
     *
     * @return string 
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set nas
     *
     * @param string $nas
     */
    public function setNas($nas)
    {
        $this->nas = $nas;
    }

    /**
     * Get nas
     *
     * @return string 
     */
    public function getNas()
    {
        return $this->nas;
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
     * Set utilisateur
     *
     * @param \MyApp\UtilisateurBundle\Entity\Utilisateur $utilisateur
     * @return Travailleur
     */
    public function setUtilisateur(\MyApp\UtilisateurBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \MyApp\UtilisateurBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}