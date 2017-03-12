<?php

namespace ContribuxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="ContribuxBundle\Repository\ProjetRepository")
 */
class Projet {

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
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="datetime")
     */
    private $dateModif;

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
     * @var boolean
     *
     * @ORM\Column(name="documentation", type="boolean", length=255, nullable=true)
     */
    private $documentation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="developpement", type="boolean", length=255)
     */
    private $developpement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="graphisme", type="boolean", length=255)
     */
    private $graphisme;

    /**
     * @var boolean
     *
     * @ORM\Column(name="traduction", type="boolean", length=255)
     */
    private $traduction;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tests", type="boolean", length=255)
     */
    private $tests;

    /**
     * @ORM\ManyToOne(targetEntity="ContribuxBundle\Entity\Categorie",cascade={"persist"}, inversedBy="projets")
     *
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="projets")
     *
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="ContribuxBundle\Entity\Langage",cascade={"persist"}, inversedBy="projets")
     *
     */
    private $langage;

    /**
     * @var string
     *
     * @ORM\Column(name="pictureName", type="string", length=255, nullable=true)
     */
    private $pictureName = null;

    public function __construct() {
        $this->dateCreation = new \DateTime();
        $this->dateModif = new \DateTime();
        $this->site = "http://"; //on indique déjà le http:// nécessaire pour l'affichage
    }

    /**
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 500,
     *     minHeight = 100,
     *     maxHeight = 500,
     *     maxSize="2M")
     *
     */
    public $file;

    public function getWebPath() {
        return null === $this->pictureName ? null : $this->getUploadDir() . '/' . $this->pictureName;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return 'uploads';
    }

    public function uploadProjetPicture() {

        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->pictureName = "uploads/" . $this->file->getClientOriginalName();
        $this->file = null;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Projet
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Projet
     */
    public function setSite($site) {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite() {
        if ($this->nom != "" && $this->site == "http://") { //Si aucun site renseigné
            return "Non renseigné";
        } else {
            return $this->site;
        }
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Projet
     */
    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation() {
        return $this->dateCreation;
    }

    /**
     * Set categorie
     *
     * @param \ContribuxBundle\Entity\Categorie $categorie
     *
     * @return Projet
     */
    public function setCategorie(\ContribuxBundle\Entity\Categorie $categorie) {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ContribuxBundle\Entity\Categorie
     */
    public function getCategorie() {
        return $this->categorie;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Projet
     */
    public function setUser(\UserBundle\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set pictureName
     *
     * @param string $pictureName
     * @return Projet
     */
    public function setPictureName($pictureName) {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * Get pictureName
     *
     * @return string
     */
    public function getPictureName() {
        if ($this->pictureName == "") {
            return "/bundles/contribux/img/default.png";
        } else {
            return $this->pictureName;
        }
    }

    /**
     * Set langage
     *
     * @param \ContribuxBundle\Entity\Langage $langage
     *
     * @return Projet
     */
    public function setLangage(\ContribuxBundle\Entity\Langage $langage = null) {
        $this->langage = $langage;

        return $this;
    }

    /**
     * Get langage
     *
     * @return \ContribuxBundle\Entity\Langage
     */
    public function getLangage() {
        return $this->langage;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return Projet
     */
    public function setDateModif($dateModif) {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif() {
        return $this->dateModif;
    }

    /**
     * Set documentation
     *
     * @param boolean $documentation
     *
     * @return Projet
     */
    public function setDocumentation($documentation) {
        $this->documentation = $documentation;

        return $this;
    }

    /**
     * Get documentation
     *
     * @return boolean
     */
    public function getDocumentation() {
        return $this->documentation;
    }

    /**
     * Set developpement
     *
     * @param boolean $developpement
     *
     * @return Projet
     */
    public function setDeveloppement($developpement) {
        $this->developpement = $developpement;

        return $this;
    }

    /**
     * Get developpement
     *
     * @return boolean
     */
    public function getDeveloppement() {
        return $this->developpement;
    }

    /**
     * Set graphisme
     *
     * @param boolean $graphisme
     *
     * @return Projet
     */
    public function setGraphisme($graphisme) {
        $this->graphisme = $graphisme;

        return $this;
    }

    /**
     * Get graphisme
     *
     * @return boolean
     */
    public function getGraphisme() {
        return $this->graphisme;
    }

    /**
     * Set traduction
     *
     * @param boolean $traduction
     *
     * @return Projet
     */
    public function setTraduction($traduction) {
        $this->traduction = $traduction;

        return $this;
    }

    /**
     * Get traduction
     *
     * @return boolean
     */
    public function getTraduction() {
        return $this->traduction;
    }

    /**
     * Set tests
     *
     * @param boolean $tests
     *
     * @return Projet
     */
    public function setTests($tests) {
        $this->tests = $tests;

        return $this;
    }

    /**
     * Get tests
     *
     * @return boolean
     */
    public function getTests() {
        return $this->tests;
    }

}
