<?php

namespace App\Form;

use App\Entity\DocumentoExtra;
use App\Entity\FichaProcesos;
use App\Entity\DocTipoExtra;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentoExtraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('codigo', TextType::class, array(
                'label' => 'Código',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('titulo', TextType::class, array(
                'label' => 'Título',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechapublicacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de publicación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('vigente', ChoiceType::class, array(
                'choices'  => array(
                    'SI' => 'SI',
                    'NO' => 'NO',
                ),
                'label' => 'Vigente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('vinculoarchivo', FileType::class, array(
                'label' => 'Archivo',
                'required' => false
            ))
            ->add('fkproceso', EntityType::class, array(
                'class' => FichaProcesos::class,
                'query_builder' => function (EntityRepository $fc) {
                    return $fc->createQueryBuilder('f')
                        ->where('f.estado=1')
                        ->orderBy('f.codproceso', 'ASC');
                },
                'choice_label' => 'codproceso',
                'label' => 'Proceso',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fktipo', EntityType::class, array(
                'class' => DocTipoExtra::class,
                'query_builder' => function (EntityRepository $tp) {
                    return $tp->createQueryBuilder('t')
                        ->where('t.estado=1')
                        ->orderBy('t.tipo', 'ASC');
                },
                'choice_label' => 'tipo',
                'label' => 'Tipo de documento',
                'attr' => ['class' => 'form-line form-label']
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
            'data_class' => DocumentoExtra::class,
        ]);
    }
}
