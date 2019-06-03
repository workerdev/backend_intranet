<?php

namespace App\Form;

use App\Entity\FichaCargo;
use App\Entity\GerenciaAreaSector;
use App\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichaCargoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('nombre', TextType::class, array(
                'label' => 'Nombre',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('objetivo', TextareaType::class, array(
                'label' => 'Objetivo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('responsabilidades', TextareaType::class, array(
                'label' => 'Responsabilidades',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('experiencia', TextareaType::class, array(
                'label' => 'Experiencia',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('conocimientos', TextareaType::class, array(
                'label' => 'Conocimientos',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('formacion', TextareaType::class, array(
                'label' => 'Formación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('caracteristicas', TextareaType::class, array(
                'label' => 'Características',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechaaprobacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de aprobación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkarea', EntityType::class, array(
                'class' => GerenciaAreaSector::class,
                'query_builder' => function (EntityRepository $gas) {
                    return $gas->createQueryBuilder('a')
                        ->where('a.estado=1');
                },
                'choice_label' => function ($fkarea) {
                    return $fkarea->getFksector()->getNombre();
                },
                'label' => 'Área, gerencia y sector',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkjefeaprobador', EntityType::class, array(
                'class' => Usuario::class,
                'query_builder' => function (EntityRepository $jf) {
                    return $jf->createQueryBuilder('j')
                        ->where('j.estado=1');
                },
                'choice_label' => function ($fkjefeaprobador) {
                    return $fkjefeaprobador->getNombre() . ' ' . $fkjefeaprobador->getApellido();
                },
                'label' => 'Jefe inmediato superior',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('firmajefe', ChoiceType::class, array(
                'choices'  => array(
                    'Por aprobar' => 'Por aprobar',
                    'APROBADO' => 'APROBADO',
                    'RECHAZADO' => 'RECHAZADO',
                ),
                'label' => 'Firma jefe',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkgerenteaprobador', EntityType::class, array(
                'class' => Usuario::class,
                'query_builder' => function (EntityRepository $gr) {
                    return $gr->createQueryBuilder('g')
                        ->where('g.estado=1');
                },
                'choice_label' => function ($fkgerenteaprobador) {
                    return $fkgerenteaprobador->getNombre() . ' ' . $fkgerenteaprobador->getApellido();
                },
                'label' => 'Gerente de área',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('firmagerente', ChoiceType::class, array(
                'choices'  => array(
                    'Por aprobar' => 'Por aprobar',
                    'APROBADO' => 'APROBADO',
                    'RECHAZADO' => 'RECHAZADO',
                ),
                'label' => 'Firma gerente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('hipervinculo', FileType::class, array(
                'label' => 'Archivo',
                'required' => false
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
            'data_class' => FichaCargo::class,
        ]);
    }
}
