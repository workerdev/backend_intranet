<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DatoEmpresarial
 * @ORM\Table(name="cb_configuracion_datoempresarial", indexes={@ORM\Index(name="cb_datoempresarial_fktipodatoempresarial", columns={"cb_datoempresarial_fktipodatoempresarial"})})
 * @ORM\Entity(repositoryClass="App\Repository\DatoEmpresarialRepository")
 */
class DatoEmpresarial
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_datoempresarial_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    

    /**
     * @var string
     *
     * @ORM\Column(name="cb_datoempresarial_descripcion", type="string", length=500, nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

     /**
     * @var \tipodatoempresarial
     *
     * @ORM\ManyToOne(targetEntity="TipoDatoEmpresarial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_datoempresarial_fktipodatoempresarial", referencedColumnName="cb_tipodatoempresarial_id")
     * })
      * @Assert\NotBlank
     */
    private $fktipodatoempresarial;


    /**
     * @var int
     *
     * @ORM\Column(name="cb_datoempresarial_estado", type="integer", nullable=false)
     */
    private $estado;

    
   


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
   

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFktipodatoempresarial(): ?TipoDatoEmpresarial
    {
        return $this->fktipodatoempresarial;
    }

    public function setFktipodatoempresarial(?TipoDatoEmpresarial $fktipodatoempresarial): self
    {
        $this->fktipodatoempresarial = $fktipodatoempresarial;

        return $this;
    }
}
