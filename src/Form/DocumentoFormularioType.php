<?php

namespace App\Form;

use App\Entity\DocumentoFormulario;
use App\Entity\Documento;
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


class DocumentoFormularioType extends AbstractType
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
            ->add('versionVigente', TextType::class, array(
                'label' => 'Versión vigente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechaPublicacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de publicación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('vinculoFileDig', FileType::class, array(
                'label' => 'Archivo digital',
                'required' => false
            ))
            ->add('vinculoFileDesc', FileType::class, array(
                'label' => 'Archivo de descarga',
                'required' => false
            ))
            ->add('fkdocumento', EntityType::class, array(
                'class' => Documento::class,
                'query_builder' => function (EntityRepository $dc) {
                    return $dc->createQueryBuilder('d')
                        ->where('d.estado=1');
                },
                'choice_label' => 'codigo',
                'label' => 'Documento',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkaprobador', EntityType::class, array(
                'class' => Usuario::class,
                'query_builder' => function (EntityRepository $fc) {
                    return $fc->createQueryBuilder('u')
                        ->where('u.estado=1');
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
            'data_class' => DocumentoFormulario::class,
        ]);
    }
}
