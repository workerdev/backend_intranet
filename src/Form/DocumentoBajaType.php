<?php

namespace App\Form;

use App\Entity\DocumentoBaja;
use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DocumentoBajaType extends AbstractType
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
            ->add('versionvigente', TextType::class, array(
                'label' => 'Versión vigente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechapublicacion', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de baja',
                'attr' => ['class' => 'form-line form-label']
            ])
            ->add('carpetaoperativa', NumberType::class, array(
                'label' => 'Carpeta operativa',
                'attr' => ['class' => 'form-line form-label'],
                'required' => false
            ))
            ->add('vinculoarchivo', FileType::class, array(
                'label' => 'Archivo',
                'required' => false
            ))
            ->add('fkproceso', EntityType::class, array(
                'class' => FichaProcesos::class,
                'query_builder' => function (EntityRepository $fp) {
                    return $fp->createQueryBuilder('f')
                        ->where('f.estado=1')
                        ->orderBy('f.codproceso', 'ASC');
                },
                'choice_label' => 'codproceso',
                'label' => 'Proceso',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fktipo', EntityType::class, array(
                'class' => TipoDocumento::class,
                'query_builder' => function (EntityRepository $tp) {
                    return $tp->createQueryBuilder('t')
                        ->where('t.estado=1')
                        ->orderBy('t.nombre', 'ASC');
                },
                'choice_label' => 'nombre',
                'label' => 'Tipo de documento',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkaprobador', EntityType::class, array(
                'class' => Usuario::class,
                'query_builder' => function (EntityRepository $fc) {
                    return $fc->createQueryBuilder('u')
                        ->where('u.estado=1')
                        ->orderBy('u.nombre', 'ASC');
                },
                'choice_label' => function ($fkaprobador) {
                    return $fkaprobador->getNombre() . ' ' . $fkaprobador->getApellido();
                },
                'label' => 'Aprobador',
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
            'data_class' => DocumentoBaja::class,
        ]);
    }
}
