<?php namespace TechnoChoix;
use DateTime;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @DI\Service("techno_choix.entity.produit", public=true)
 * @ORM\Entity
 * @ORM\Table(name="produits")
 */
class Produit
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     /**
     * @ORM\Column(type="string")
     */
    protected $nom;
     /**
     * @ORM\Column(type="integer")
     */
    protected $prix;
    /**
     * @ORM\Column(type="string", name="details_techniques", nullable=true)
     */
    protected $detailsTechniques;
    /**
     * @ORM\Column(type="string")
     */
    protected $image;

    public function __construct($nom='')
    {
        $this->nom=$nom;
    }
    public static function ajouter($nom)
    {
        $produit=new static($nom);
        return $produit;
    }
    public function prix($prix)
    {
        $this->prix=$prix;
        return $this;
    }
    public function detailsTechniques($details)
    {
        $this->detailsTechniques=$details;
        return $this;
    }
    public function image($image)
    {
        $this->image=$image;
        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of nom.
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Gets the value of prix.
     *
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Gets the value of detailsTechniques.
     *
     * @return mixed
     */
    public function getDetailsTechniques()
    {
        return $this->detailsTechniques;
    }

    /**
     * Gets the value of image.
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
}