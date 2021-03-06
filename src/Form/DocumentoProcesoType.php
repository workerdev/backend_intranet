<?php

namespace App\Form;

use App\Entity\DocumentoProceso;
use App\Entity\Documento;
use App\Entity\DocumentoFormulario;
use App\Entity\TipoDocumento;
use App\Entity\FichaProcesos;
use App\Entity\Usuario;
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

class DocumentoProcesoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
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
            ->add('nuevoactualizacion', ChoiceType::class, array(
                'choices'  => array(
                    'NUEVO' => 'NUEVO',
                    'ACTUALIZACION' => 'ACTUALIZACION',
                ),
                'label' => 'Nuevo/Actualización',
                'attr' => ['class' => 'form-line form-label']
            ))  
            ->add('codigonuevo', TextType::class, array(
                'label' => 'Código de Documento',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkdocumento', EntityType::class, array(
                'class' => Documento::class,
                'query_builder' => function (EntityRepository $doc) {
                    return $doc->createQueryBuilder('d')
                        ->where('d.estado=1')
                        ->orderBy('d.codigo', 'ASC');
                },
                'choice_label' => 'codigo',
                'label' => 'Documento',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkformulario', EntityType::class, array(
                'class' => DocumentoFormulario::class,
                'query_builder' => function (EntityRepository $docf) {
                    return $docf->createQueryBuilder('df')
                        ->where('df.estado=1')
                        ->orderBy('df.codigo', 'ASC');
                },
                'choice_label' => 'codigo',
                'label' => 'Documento formulario',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('titulo', TextType::class, array(
                'label' => 'Título',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('versionvigente', NumberType::class, array(
                'label' => 'Versión vigente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('vinculoarchivo', FileType::class, array(
                'label' => 'Archivo',
                'required' => false
            ))
            ->add('carpetaoperativa', TextType::class, array(
                'label' => 'Carpeta operativa',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('aprobadorechazado', ChoiceType::class, array(
                'choices'  => array(
                    'APROBADO' => 'APROBADO',
                    'RECHAZADO' => 'RECHAZADO',
                ),
                'label' => 'Aprobado/Rechazado',
                'required' => false,
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
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechaaprobacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de aprobación',
                'attr' => ['class' => 'form-line form-label'],
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
            
            ->add('submit',SubmitType::class, array(
                'label' => 'Guardar',
                'attr' => ['class' => 'btn bg-indigo waves-effect']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentoProceso::class,
        ]);
    }
}
