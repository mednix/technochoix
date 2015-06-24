<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Produit;

/**
 * @DI\Service("techno_choix.repository.produits", public=true)
 */
class Produits
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager
            ->getRepository('TechnoChoix:Produit');
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