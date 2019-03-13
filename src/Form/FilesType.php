<?php

namespace App\Form;

use App\Entity\Files;
use App\Entity\Galeria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'Enlaces ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('ruta',Filetype::class, array(
                'label' => 'Elegir archivo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('tipo', ChoiceType::class, array(
                'choices'  => array(
                    'video' => 'video',
                    'imagen' => 'imagen',
                ),
                'label' => 'Tipo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkgaleria', EntityType::class, array(
                // looks for choices from this entity
                'class' => Galeria::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nombre',
                'label' => 'Galería',
                'attr' => ['class' => 'form-line form-label' , 'id' => 'ariel' ],
                'attr' => ['id' => 'ariel']
            
                // used to render a select box, check boxes or radios
//                 'multiple' => true,
                //'expanded' => true,
            ))
            ->add('submit',SubmitType::class, array(
                'label' => 'Guardar',
                'attr' => ['class' => 'btn bg-indigo waves-effect']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Files::class,
        ]);
    }
}
