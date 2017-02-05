<?php

namespace contribux\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="contribux\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1, nullable=true)
     */
    private $sexe;


    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text")
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="ircUsername", type="string", length=255, nullable=true)
     */
    private $ircUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="ircNetwork", type="string", length=255, nullable=true)
     */
    private $ircNetwork;


    /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean", length=255, nullable=true)
     */
    private $disponible;


    /**
     * @var ArrayCollection $annonces
     * @ORM\OneToMany(targetEntity="contribux\ContribuxBundle\Entity\Annonce", mappedBy="user")
     */
    private $annonces;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set ircUsername
     *
     * @param string $ircUsername
     *
     * @return User
     */
    public function setIrcUsername($ircUsername)
    {
        $this->ircUsername = $ircUsername;

        return $this;
    }

    /**
     * Get ircUsername
     *
     * @return string
     */
    public function getIrcUsername()
    {
        return $this->ircUsername;
    }


    /**
     * Set ircNetwork
     *
     * @param string $ircNetwork
     *
     * @return User
     */
    public function setIrcNetwork($ircNetwork)
    {
        $this->ircUsername = $ircNetwork;

        return $this;
    }

    /**
     * Get ircNetwork
     *
     * @return string
     */
    public function getIrcNetwork()
    {
        return $this->ircNetwork;
    }


    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }



    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return User
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }


    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return User
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        parent::__construct();
    }

    /**
     * Add annonce
     *
     * @param \contribux\contribuxBundle\Entity\Annonce $annonce
     *
     * @return User
     */
    public function addAnnonce(\contribux\contribuxBundle\Entity\annonce $annonce)
    {
        $this->annonces[] = $annonce;

        return $this;
    }

    /**
     * Remove annonce
     *
     * @param \contribux\contribuxBundle\Entity\Annonce $annonce
     */
    public function removeAnnonce(\contribux\contribuxBundle\Entity\annonce $annonce)
    {
        $this->annonces->removeElement($annonce);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }
}
