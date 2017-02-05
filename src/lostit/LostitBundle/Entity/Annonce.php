<?php

namespace lostit\LostitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="lostit\LostitBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var bool
     *
     * @ORM\Column(name="trouve", type="boolean")
     */
    private $trouve;

    /**
     * @var bool
     *
     * @ORM\Column(name="retrouve", type="boolean")
     */
    private $retrouve;

    /**
     * @var int
     *
     * @ORM\Column(name="recompense", type="integer")
     */
    private $recompense;

    /**
     * @var bool
     *
     * @ORM\Column(name="serviceOT", type="boolean")
     */
    private $serviceOT;
    
     /**
     * @ORM\ManyToOne(targetEntity="lostit\LostitBundle\Entity\Categorie",cascade={"persist"}, inversedBy="annonces")
     *
     */
    private $categorie;


    /**
     * @ORM\ManyToOne(targetEntity="lostit\UserBundle\Entity\User", inversedBy="annonces")
     *
     */
    private $user;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Annonce
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
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
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
     * Set ville
     *
     * @param string $ville
     *
     * @return Annonce
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set trouve
     *
     * @param boolean $trouve
     *
     * @return Annonce
     */
    public function setTrouve($trouve)
    {
        $this->trouve = $trouve;

        return $this;
    }

    /**
     * Get trouve
     *
     * @return bool
     */
    public function getTrouve()
    {
        return $this->trouve;
    }

    /**
     * Set retrouve
     *
     * @param boolean $retrouve
     *
     * @return Annonce
     */
    public function setRetrouve($retrouve)
    {
        $this->retrouve = $retrouve;

        return $this;
    }

    /**
     * Get retrouve
     *
     * @return bool
     */
    public function getRetrouve()
    {
        return $this->retrouve;
    }

    /**
     * Set recompense
     *
     * @param integer $recompense
     *
     * @return Annonce
     */
    public function setRecompense($recompense)
    {
        $this->recompense = $recompense;

        return $this;
    }

    /**
     * Get recompense
     *
     * @return int
     */
    public function getRecompense()
    {
        return $this->recompense;
    }

    /**
     * Set serviceOT
     *
     * @param boolean $serviceOT
     *
     * @return Annonce
     */
    public function setServiceOT($serviceOT)
    {
        $this->serviceOT = $serviceOT;

        return $this;
    }

    /**
     * Get serviceOT
     *
     * @return bool
     */
    public function getServiceOT()
    {
        return $this->serviceOT;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Annonce
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set categorie
     *
     * @param \lostit\LostitBundle\Entity\Categorie $categorie
     *
     * @return Annonce
     */
    public function setCategorie(\lostit\LostitBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \lostit\LostitBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set user
     *
     * @param \lostit\UserBundle\Entity\User $user
     *
     * @return Annonce
     */
    public function setUsermap(\lostit\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \lostit\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
