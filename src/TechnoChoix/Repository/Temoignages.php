<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Temoignages;

/**
 * @DI\Service("techno_choix.repository.temoignages", public=true)
 */
class Temoignagess
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager
            ->getRepository('TechnoChoix:Temoignage');
    }
    public function trouverParId($id)
    {
        return $this->repository->find($id);
    }
    public function trouverTous()
    {
        return $this->repository->findAll();
    }
}