<?php namespace TechnoChoix\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjouterProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('prix');
        $builder->add('image', 'file',[
            'attr'=>[
            'class'=>'file'
        ] 
        ]);
        $builder->add('detailsTechniques', 'textarea');
        $builder->add('Enregistrer', 'submit',[
            'attr'=>[
                'class'=>'btn btn-primary'
            ]
        ]);
    }

    public function getName()
    {
        return 'ajouter_produit';
    }
}