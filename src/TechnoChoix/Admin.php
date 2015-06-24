<?php
namespace TechnoChoix;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use TechnoChoix\Compte;
use TechnoChoix\DemandeDevis;

/**
 * @DI\Service("techno_choix.entity.admin", public=true)
 * @ORM\Entity
 * @ORM\Table(name="admins")
 */
class Admin
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToOne(targetEntity="Compte")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
	private $compte;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="\TechnoChoix\DemandeDevis", mappedBy="priseEnChargePar")
     */
    private $demandesDevisPrisesEnCharge;
    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="\TechnoChoix\Article", mappedBy="auteur")
     */
    private $articles;

    public function __construct()
    {
        $this->demandesDevisPrisesEnCharge=new ArrayCollection();
    }
	public function prendreEnChargeDemandeDevis(DemandeDevis $demande){
		$demande->prendreEnChargePar($this);
        $this->demandesDevisPrisesEnCharge->add($demande);
	}



    /**
     *
     * @param mixed $compte the compte
     *
     * @return self
     */
    public function setCompte(Compte $compte)
    {
        $this->compte = $compte;

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
}