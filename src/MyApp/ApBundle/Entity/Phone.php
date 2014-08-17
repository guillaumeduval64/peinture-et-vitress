<?php
namespace MyApp\ApBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Phone
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
    private $phone;

      /**
   * @ORM\ManyToOne(targetEntity="PhoneType", cascade={"persist"})
   */
  private $phoneType;
    
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
     * Set phone
     *
     * @param string $phone
     * @return Phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Phone
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
     * @return Phone
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
     * Set phoneType
     *
     * @param \MyApp\ApBundle\Entity\PhoneType $phoneType
     * @return Phone
     */
    public function setPhoneType(\MyApp\ApBundle\Entity\PhoneType $phoneType = null)
    {
        $this->phoneType = $phoneType;
    
        return $this;
    }

    /**
     * Get phoneType
     *
     * @return \MyApp\ApBundle\Entity\PhoneType 
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }
}