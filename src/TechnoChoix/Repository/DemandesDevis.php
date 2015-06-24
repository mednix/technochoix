<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\DemandeDevis;

/**
 * @DI\Service("techno_choix.repository.demandes_devis", public=true)
 */
class DemandesDevis
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager->getRepository('TechnoChoix:DemandeDevis');
    }
    public function trouverDemandesPrisesEnCharge(){
        $query = $this->repository->createQueryBuilder('d')
            ->where('d.etat = :etat')
            ->setParameter('etat', DemandeDevis::ETAT_PRISE_EN_CHARGE)
            ->orderBy('d.date', 'DESC')
            ->getQuery();
        
        return $query->getResult();
    }
   public function trouverDemandesNonPrisesEnCharge(){
        
       $query = $this->repository->createQueryBuilder('d')
            ->where('d.etat = :etat')
            ->setParameter('etat', DemandeDevis::ETAT_NON_PRISE_EN_CHARGE)
            ->orderBy('d.date', 'DESC')
            ->getQuery();
        
        return $query->getResult();
    }
    public function trouverParId($id)
    {
        return $this->repository->find($id);
    }
}