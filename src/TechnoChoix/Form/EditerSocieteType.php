<?php namespace TechnoChoix\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditerSocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('telephone');
        $builder->add('fax');
        $builder->add('email');
        $builder->add('adresse');
        $builder->add('facebook');
        $builder->add('twitter');
        $builder->add('googlePlus');
        $builder->add('Enregistrer', 'submit',[
            'attr'=>[
                'class'=>'btn btn-primary'
            ]
        ]);
    }

    public function getName()
    {
        return 'editer_societe';
    }
}