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

class DocumentoFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('vinculoarchivo', FileType::class, array(
            'label' => 'Archivo',
            'required' => false
        ))
        ->add('submit',SubmitType::class, array(
            'label' => 'Aceptar',
            'attr' => ['class' => 'btn bg-indigo waves-effect']
        ))
        ->add('id', TextType::class, array(
            
            'attr' => ['type' => 'hidden']
        ))
        ->add('firma', TextType::class, array(
            'attr' => ['type' => 'hidden']
        ))
        ->add('responsable', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('estadodoc', TextType::class, array(
            'attr' => ['type' => 'hidden']
        ))
      
        ;
    }
}
