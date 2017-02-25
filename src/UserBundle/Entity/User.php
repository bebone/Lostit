<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
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
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private $site;





    /**
     * @var ArrayCollection $projets
     * @ORM\OneToMany(targetEntity="ContribuxBundle\Entity\Projet", mappedBy="user")
     */
    private $projets;


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
        $this->ircNetwork = $ircNetwork;

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
     * Constructor
     */
    public function __construct()
    {
        $this->projets = new ArrayCollection();
        parent::__construct();
    }

    /**
     * Add projet
     *
     * @param \ContribuxBundle\Entity\Projet $projet
     *
     * @return User
     */
    public function addProjet(\ContribuxBundle\Entity\Projet $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ContribuxBundle\Entity\Projet $projet
     */
    public function removeProjet(\ContribuxBundle\Entity\Projet $projet)
    {
        $this->projets->removeElement($projet);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return User
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }
}
