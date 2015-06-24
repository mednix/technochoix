<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\DemandeDevis;

/**
 * @DI\Service("techno_choix.repository.clients", public=true)
 */
class Clients
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager->getRepository('TechnoChoix:Client');
    }
    public function trouverParTelephone($telephone){
        return $this->repository->findOneBy(['telephone'=>$telephone]);
    }
}