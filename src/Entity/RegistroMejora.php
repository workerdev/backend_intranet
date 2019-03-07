<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * RegistroMejora
 * @ORM\Table(name="cb_acciones_registro_mejora", indexes={@ORM\Index(name="cb_registro_mejora_id", columns={"cb_registro_mejora_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\RegistroMejoraRepository")
 */
class RegistroMejora
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_registro_mejora_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ficha
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_registro_mejora_fkficha", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkficha;

    /**
     * @var \tiponovedad    
     *
     * @ORM\ManyToOne(targetEntity="TipoNovedad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_registro_mejora_fktiponovedad", referencedColumnName="cb_tipo_novedad_id")
     * })
     * @Assert\NotBlank
     */
    private $fktiponovedad;

    /**
     * @var \norma
     *
     * @ORM\ManyToOne(targetEntity="TipoNorma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_registro_mejora_fknorma", referencedColumnName="cb_tipo_norma_id")
     * })
     * @Assert\NotBlank
     */
    private $fknorma;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_registro_mejora_responsablenovedad", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $responsablenovedad;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_registro_mejora_novedad", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    private $novedad;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_registro_mejora_analisis", type="string", length=300, nullable=false)
     * @Assert\NotBlank
     */
    private $analisis;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_registro_mejora_responsableimplementacion", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $responsableimplementacion;
    
    /**
     * @var \estado
     *
     * @ORM\ManyToOne(targetEntity="EstadoNovedad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_registro_mejora_fkestado", referencedColumnName="cb_estado_novedad_id")
     * })
     * @Assert\NotBlank
     */
    private $fkestado;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_registro_mejora_estado", type="integer", nullable=false)
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
    
    public function getFkficha(): ?FichaProcesos
    {
        return $this->fkficha;
    }

    public function setFkficha(?FichaProcesos $fkficha): self
    {
        $this->fkficha = $fkficha;

        return $this;
    }
    public function getFktiponovedad(): ?TipoNovedad
    {
        return $this->fktiponovedad;
    }

    public function setFktiponovedad(?TipoNovedad $fktiponovedad): self
    {
        $this->fktiponovedad = $fktiponovedad;

        return $this;
    }
    public function getFknorma(): ?TipoNorma
    {
        return $this->fknorma;
    }

    public function setFknorma(?TipoNorma $fknorma): self
    {
        $this->fknorma = $fknorma;

        return $this;
    }
    public function getResponsablenovedad(): ?string
    {
        return $this->responsablenovedad;
    }

    public function setResponsablenovedad(string $responsablenovedad): self
    {
        $this->responsablenovedad = $responsablenovedad;

        return $this;
    }

    public function getNovedad(): ?string
    {
        return $this->novedad;
    }

    public function setNovedad(string $novedad): self
    {
        $this->novedad = $novedad;

        return $this;
    }
    public function getAnalisis(): ?string
    {
        return $this->analisis;
    }

    public function setAnalisis(string $analisis): self
    {
        $this->analisis = $analisis;

        return $this;
    }

    public function getResponsableimplementacion(): ?string
    {
        return $this->responsablenovedad;
    }

    public function setResponsableimplementacion(string $responsableimplementacion): self
    {
        $this->responsableimplementacion = $responsableimplementacion;

        return $this;
    }
    public function getFkestado(): ?EstadoNovedad
    {
        return $this->fkestado;
    }

    public function setFkestado(?EstadoNovedad $fkestado): self
    {
        $this->fkestado = $fkestado;

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
}
