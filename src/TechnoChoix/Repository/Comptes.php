<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Compte;

/**
 * @DI\Service("techno_choix.repository.comptes", public=true)
 */
class Comptes
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager->getRepository('TechnoChoix:Compte');
    }
    public function getCompteCourant(){
        
        return null;
    }
   
}