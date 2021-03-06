<?php

namespace Worker\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\ORM\EntityRepository;

class RegistrationFormType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', array('translation_domain' => 'FOSUserBundle', 'required' => true))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array(),
                'second_options' => array(),
                'invalid_message' => 'fos_user.password.mismatch'))
            ->add('firstname', 'text', array('translation_domain' => 'FOSUserBundle', 'required' => true))
            ->add('lastname', 'text', array('translation_domain' => 'FOSUserBundle', 'required' => true))
            ->add('mobile', 'text', array('required' => true))
            ->add('description', 'textarea', array('required' => false));

        $builder->add('category', 'entity', array(
                    'required' => true,
                    'class' => 'WorkerUserBundle:Category',
                    'multiple' => false,
                    'query_builder' => function(EntityRepository $er ) {
                        return $er->createQueryBuilder('c');
                    },
                    'property' => 'name', 
                    'empty_value' => 'Select Category'        
        ));    
        
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention' => 'registration',
        ));
        
    }
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'worker_user_registration';
    }
}
