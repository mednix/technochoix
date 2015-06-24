<?php
namespace TechnoChoix;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
use DateTime;

 
/**
 * @DI\Service("techno_choix.entity.demande_devis", public=true)
 * @ORM\Entity
 * @ORM\Table(name="demandes_devis")
 */
class DemandeDevis
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
    * @ORM\ManyToOne(targetEntity="\TechnoChoix\Client", inversedBy="demandesDevis")
    * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
    */
    private $client;
    /**
     * @ORM\Column(type="string")
     */
    private $texte;
    /**
    * @ORM\ManyToOne(targetEntity="\TechnoChoix\Admin", inversedBy="demandesDevisPrisesEnCharge")
    * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
    */
    private $priseEnChargePar;
     /**
     * @ORM\Column(type="integer")
     */
    private $etat;
    const ETAT_NON_PRISE_EN_CHARGE=0;
    const ETAT_PRISE_EN_CHARGE=1;
    public function __construct()
    {
        $this->etat=self::ETAT_NON_PRISE_EN_CHARGE;
        $this->date=new DateTime();
    }
    public static function fairePar(Client $client){
        $demande=new static();
        $demande->client=$client;
        return $demande;
    }
    public function ecrire($texte){
        $this->texte=$texte;
        return $this;
    }
    public function prendreEnChargePar(Admin $admin)
    {
        $this->etat=self::ETAT_PRISE_EN_CHARGE;
        $this->priseEnChargePar=$admin;
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
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Gets the value of client.
     *
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Gets the value of texte.
     *
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }
}