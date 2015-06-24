<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Admin;

/**
 * @DI\Service("techno_choix.repository.admins", public=true)
 */
class Admins
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager->getRepository('TechnoChoix:Admin');
    }
    public function trouverParId($id)
    {
        return $this->repository->find($id);
    }
    public function trouverTous(){
        $resultat = $this->repository->findAll();
        
        return $resultat;
    }
}