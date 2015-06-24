<?php namespace TechnoChoix\Repository;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Article;

/**
 * @DI\Service("techno_choix.repository.articles", public=true)
 */
class Articles
{
    private $repository;

    /**
     * @DI\InjectParams({
     *     "entityManager" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $entityManager){
        $this->repository=$entityManager->getRepository('TechnoChoix:Article');
    }
    public function trouverParId($id)
    {
        return $this->repository->find($id);
    }
    public function trouverTous(){
        $query = $this->repository->createQueryBuilder('a')
            ->where('a.etat != :etat')
            ->setParameter('etat', Article::ETAT_SUPPRIME)
            ->orderBy('a.date', 'DESC')
            ->getQuery();
        
        return $query->getResult();
    }
}