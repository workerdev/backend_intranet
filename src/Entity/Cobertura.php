<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Cobertura
 * @ORM\Table(name="cb_ind_cobertura", uniqueConstraints={@ORM\UniqueConstraint(name="cb_cobertura_id", columns={"cb_cobertura_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CoberturaRepository")
 */
class Cobertura
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_cobertura_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoCobertura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_cobertura_fktipo", referencedColumnName="cb_tipo_cobertura_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_cobertura_unidad", type="text", nullable=true)
     */
    private $unidad;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_cobertura_anio", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $anio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_cobertura_mes", type="text", nullable=false)
     */
    private $mes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_cobertura_valor", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $valor;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_cobertura_estado", type="integer", nullable=true)
     *
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }  

    public function getFktipo(): ?TipoCobertura
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoCobertura $fktipo): self
    {
        $this->fktipo = $fktipo;

        return $this;
    }  
    
    public function getUnidad(): ?string
    {
        return $this->unidad;
    }

    public function setUnidad(string $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }
    
    public function getAnio(): ?string
    {
        return $this->anio;
    }

    public function setAnio(string $anio): self
    {
        $this->anio = $anio;

        return $this;
    }
    
    public function getMes(): ?string
    {
        return $this->mes;
    }

    public function setMes(string $mes): self
    {
        $this->mes = $mes;

        return $this;
    }
    
    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

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