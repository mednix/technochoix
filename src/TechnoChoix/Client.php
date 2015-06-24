<?php
namespace TechnoChoix;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @DI\Service("techno_choix.entity.client", public=true)
 * @ORM\Entity
 * @ORM\Table(name="clients")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="\TechnoChoix\DemandeDevis", mappedBy="client")
     */
	private $demandesDevis;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephone;
    public function __construct()
    {
        $this->demandesDevis=new ArrayCollection();
    }
    public static function nouveau($nom, $telephone){
        $client=new static();
        $client->nom=$nom;
        $client->telephone=$telephone;
        return $client;
    }
	public function faireDemandeDevis($texte){
		$demande=DemandeDevis::fairePar($this)
			->ecrire($texte);
		$this->demandesDevis->add($demande);
		return $demande;
	}
    /**
     * @return string
     */
    public function getTelephone(){
        return $this->telephone;
    }

    /**
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
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
}