<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use TechnoChoix\Command\EcrireArticle;
use TechnoChoix\Form\EcrireArticleType;
use TechnoChoix\Command\AjouterProduit;
use TechnoChoix\Form\AjouterProduitType;
use TechnoChoix\Article;
use TechnoChoix\Produit;
class BackendController extends Controller
{
    /**
     * @Route("/backend", name="backend_index")
     */
    public function indexAction()
    {
        return $this->render('backend/index.twig');
    }
    /**
     * @Route("/backend/devis", name="backend_devis")
     */
    public function devisAction()
    {
        $demandes=$this->get('techno_choix.repository.demandes_devis');
        
        $anciennes=$demandes->trouverDemandesPrisesEnCharge();
        $nouvelles=$demandes->trouverDemandesNonPrisesEnCharge();
        return $this->render('backend/devis.twig', [
            'demandes' =>[
                'anciennes'=>$anciennes,
                'nouvelles'=>$nouvelles
            ]
        ]);
    }
    /**
     * @Route("/backend/articles", name="backend_articles")
     */
    public function articlesAction()
    {
        $em=$this->getDoctrine()->getManager();
        $request=$this->getRequest();
        $dossier=$this->get('kernel')->getRootDir().'/../web/files';
        $admin=$this->get('security.context')->getToken()->getUser();
        $form=$this->createForm(new EcrireArticleType(), new EcrireArticle());
        $form->handleRequest($request);
        if($form->isValid()){
            $image='articles'.$form['image']->getClientOriginalName();
            $form['image']->move($dossier, $image);
            $commande=$form->getData();
            $article=Article::ecrire($commande->body)
                ->par($admin)
                ->titre($commande->titre)
                ->sousTitre($commande->sousTitre)
                ->image($image);
            $em->persist($article);
            $em->flush();
            $this->getSession()->getFlashBag()->add('message', 'Un nouvel article a bien été ajouté!');
        }
        $articles=$this->get('techno_choix.repository.articles')->trouverTous();
        return $this->render('backend/articles.twig', [
            'articles'  => $articles,
            'form'      => $form->createView()
        ]);
    }
    /**
     * @Route("/backend/produits", name="backend_produits")
     */
    public function produitsAction()
    {
        $em=$this->getDoctrine()->getManager();
        $request=$this->getRequest();
        $dossier=$this->get('kernel')->getRootDir().'/../web/files';
        $form=$this->createForm(new AjouterProduitType(), new AjouterProduit());
        $form->handleRequest($request);
        if($form->isValid()){
            $data=$form->getData();
            $image='articles/'.$form['image']->getClientOriginalName();
            $form['image']->move($dossier, $image);
            $produit=Produit::ajouter($data->nom)
                ->prix($data->prix)
                ->detailsTechniques($data->detailsTechniques)
                ->image($image);
            $em->persist($produit);
            $em->flush();
            $this->getSession()->getFlashBag()->add('message', 'Un nouveau produit a bien été ajouté!');

        }
        $produits=$this->get('techno_choix.repository.produits')->trouverTous();
        return $this->render('backend/produits.twig', [
            'produits'  => $produits,
            'form'      => $form->createView()
        ]);
    }
     /**
     * @Route("/backend/societe", name="backend_societe")
     */
    public function societeAction()
    {
        $societe=$this->get('techno_choix.repository.societes')->getSociete();
        return $this->render('backend/societe.twig', 
            ['societe'=>$societe]
        );
    }
    
}
