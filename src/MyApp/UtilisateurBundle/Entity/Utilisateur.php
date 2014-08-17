<?php
namespace MyApp\UtilisateurBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use FOS\UserBundle\Model\GroupableInterface;
use FOS\UserBundle\Entity\Group as BaseGroup; 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\generatedValue(strategy="AUTO")
    */
    protected $id;
    
     /**
     * @ORM\OneToMany(targetEntity="\MyApp\ApBundle\Entity\Travailleur", mappedBy="utilisateur", cascade={"persist","remove"})
     */    
    private $travailleur;
    
     /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */    
    private $note;
    
    /**
     * @ORM\ManyToMany(targetEntity="MyApp\UtilisateurBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $group;

    public function __construct()
    {
        parent::__construct();
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
     * Add Travailleur
     *
     * @param \MyApp\UtilisateurBundle\Entity\Travailleur $travailleur
     * @return Utilisateur
     */
    public function addTravailleur(\MyApp\ApBundle\Entity\Travailleur $travailleur)
    {
        $this->Travailleur[] = $travailleur;
    
        return $this;
    }

    /**
     * Remove Travailleur
     *
     * @param \MyApp\UtilisateurBundle\Entity\Travailleur $travailleur
     */
    public function removeTravailleur(\MyApp\ApBundle\Entity\Travailleur $travailleur)
    {
        $this->Travailleur->removeElement($travailleur);
    }

    /**
     * Get Travailleur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTravailleur()
    {
        return $this->Travailleur;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Utilisateur
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
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
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }
}