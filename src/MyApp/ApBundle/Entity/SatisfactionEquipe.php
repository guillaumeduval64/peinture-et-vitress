<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class SatisfactionEquipe
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
     * @ORM\Column(type="string",length=255)
     */    
    private $difficulte;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $sympathie;
    
     /**
     * @ORM\OneToOne(targetEntity="DateTable", cascade={"remove", "persist"})
     */    
    private $dateTable;
    
     /**
     * @ORM\ManyToMany(targetEntity="Particularite", cascade={"persist","remove"})
     */    
    public $particularite;
    
     /**
     * @ORM\Column(type="string",length=255)
     */    
    private $notes;

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
     * Set reponse
     *
     * @param string $reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set courtoisie
     *
     * @param string $courtoisie
     */
    public function setCourtoisie($courtoisie)
    {
        $this->courtoisie = $courtoisie;
    }

    /**
     * Get courtoisie
     *
     * @return string 
     */
    public function getCourtoisie()
    {
        return $this->courtoisie;
    }

    /**
     * Set qualite
     *
     * @param string $qualite
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;
    }

    /**
     * Get qualite
     *
     * @return string 
     */
    public function getQualite()
    {
        return $this->qualite;
    }

    /**
     * Set grade
     *
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Get grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->grade;
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
     * Set question
     *
     * @param string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
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
     * Set appel
     *
     * @param string $appel
     */
    public function setAppel($appel)
    {
        $this->appel = $appel;
    }

    /**
     * Get appel
     *
     * @return string 
     */
    public function getAppel()
    {
        return $this->appel;
    }

    /**
     * Set equipe
     *
     * @param string $equipe
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }

    /**
     * Get equipe
     *
     * @return string 
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set service
     *
     * @param string $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * Get service
     *
     * @return string 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set peinture
     *
     * @param string $peinture
     */
    public function setPeinture($peinture)
    {
        $this->peinture = $peinture;
    }

    /**
     * Get peinture
     *
     * @return string 
     */
    public function getPeinture()
    {
        return $this->peinture;
    }

    /**
     * Set sympathie
     *
     * @param string $sympathie
     */
    public function setSympathie($sympathie)
    {
        $this->sympathie = $sympathie;
    }

    /**
     * Get sympathie
     *
     * @return string 
     */
    public function getSympathie()
    {
        return $this->sympathie;
    }

    /**
     * Set notes
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set difficulte
     *
     * @param string $difficulte
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }

    /**
     * Get difficulte
     *
     * @return string 
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Add particularite
     *
     * @param MyApp\ApBundle\Entity\Particularite $particularite
     */
    public function addParticularite(\MyApp\ApBundle\Entity\Particularite $particularite)
    {
        $this->particularite[] = $particularite;
    }

    /**
     * Get particularite
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getParticularite()
    {
        return $this->particularite;
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
     * Remove particularite
     *
     * @param \MyApp\ApBundle\Entity\Particularite $particularite
     */
    public function removeParticularite(\MyApp\ApBundle\Entity\Particularite $particularite)
    {
        $this->particularite->removeElement($particularite);
    }
}