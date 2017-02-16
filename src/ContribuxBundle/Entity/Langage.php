<?php

namespace ContribuxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langage
 *
 * @ORM\Table(name="langage")
 * @ORM\Entity(repositoryClass="ContribuxBundle\Repository\LangageRepository")
 */
class Langage
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
     * @var ArrayCollection $projets
     * @ORM\OneToMany(targetEntity="ContribuxBundle\Entity\Projet", mappedBy="langage", cascade={"persist"})
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Langage
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
     * Constructor
     */
    public function __construct()
    {
        $this->annonces = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projet
     *
     * @param \ContribuxBundle\Entity\Projet $projet
     *
     * @return Langage
     */
    public function addProjet(\ContribuxBundle\Entity\Projet $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ContribuxBundle\Entity\Annonce $projet
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
}
