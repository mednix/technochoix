<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
/**
 * @DI\Service("techno_choix.repository.societes", public=true)
 */
class Societes
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager
            ->getRepository('TechnoChoix:Societe');
    }
    public function trouverTous()
    {
        $tous=$this->repository->findAll();
        return $tous;
    }
}