<?php namespace TechnoChoix;
use DateTime;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @DI\Service("techno_choix.entity.article", public=true)
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Article
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $titre;
    /**
     * @ORM\Column(type="string", name="sous_titre", nullable=true)
     */
    private $sousTitre;
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $body;
    /**
    * @ORM\ManyToOne(targetEntity="\TechnoChoix\Admin", inversedBy="articles")
    * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
    */
    private $auteur;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $etat;
    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    const ETAT_SUPPRIME=-1;
    const ETAT_NOUVEAU=0;
    public function __construct($body=''){
        $this->etat=self::ETAT_NOUVEAU;
        $this->date=new DateTime();
        $this->body=$body;
    }
    public static function ecrire($body){
        $article=new static($body);
        return $article;
    }
    public function par($auteur)
    {
        $this->auteur=$auteur;
        return $this;
    }
    public function titre($titre)
    {
        $this->titre=$titre;
        return $this;
    }
    public function sousTitre($sousTitre)
    {
        $this->sousTitre=$sousTitre;
        return $this;
    }
    public function image($image)
    {
        $this->image=$image;
        return $this;
    }
    public function editer($body)
    {
        $this->body=$body;
        return $this;
    }
    public function supprimer()
    {
        $this->etat=self::ETAT_SUPPRIME;
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
     * Gets the value of image.
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Gets the value of titre.
     *
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Gets the value of sousTitre.
     *
     * @return mixed
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Gets the value of body.
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Gets the value of auteur.
     *
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}