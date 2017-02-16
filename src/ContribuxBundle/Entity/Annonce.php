<?php

namespace ContribuxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="ContribuxBundle\Repository\AnnonceRepository")
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     */
    private $site;


    
     /**
     * @ORM\ManyToOne(targetEntity="ContribuxBundle\Entity\Categorie",cascade={"persist"}, inversedBy="annonces")
     *
     */
    private $categorie;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="annonces")
     *
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="ContribuxBundle\Entity\Langage",cascade={"persist"}, inversedBy="annonces")
     *
     */
    private $langage;


    /**
     * @var string
     *
     * @ORM\Column(name="pictureName", type="string", length=255, nullable=true)
     */
    private $pictureName=null;




    /**
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 600,
     *     minHeight = 100,
     *     maxHeight = 600,
     *     maxSize="2M")
     *
     */
    public $file;

    public function getWebPath()
    {
        return null === $this->pictureName ? null : $this->getUploadDir().'/'.$this->pictureName;
    }


    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir(); //TODO
    }


    protected function getUploadDir()
    {
        return 'uploads';
    }

    public function uploadAnnoncePicture()
    {

        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->pictureName = "uploads/".$this->file->getClientOriginalName();
        $this->file = null;
    }




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
     * Set site
     *
     * @param string $site
     *
     * @return Annonce
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
     * @param \ContribuxBundle\Entity\Categorie $categorie
     *
     * @return Annonce
     */
    public function setCategorie(\ContribuxBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ContribuxBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Annonce
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pictureName
     *
     * @param string $pictureName
     * @return Annonce
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName()
    {
        return $this->pictureName;
    }

    /**
     * Set langage
     *
     * @param \ContribuxBundle\Entity\Langage $langage
     *
     * @return Annonce
     */
    public function setLangage(\ContribuxBundle\Entity\Langage $langage = null)
    {
        $this->langage = $langage;

        return $this;
    }

    /**
     * Get langage
     *
     * @return \ContribuxBundle\Entity\Langage
     */
    public function getLangage()
    {
        return $this->langage;
    }
}
