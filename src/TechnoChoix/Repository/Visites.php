<?php namespace TechnoChoix\Repository;

use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
/**
 * @DI\Service("techno_choix.repository.visites", public=true)
 */
class Visites {
    private $repository;
    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager
            ->getRepository('TechnoChoix:Visite');
    }

    public function trouverTous(){
        return $this->repository->findAll();
    }

    public function getTotalVisites()
    {

    }
    public function getTotalVisitesParMois($mois)
    {

    }
}