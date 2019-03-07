<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * SeguimientoIndicador
 * @ORM\Table(name="cb_proceso_seg_indicador", indexes={@ORM\Index(name="cb_seguimiento_indicador_valor", columns={"cb_seguimiento_indicador_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeguimientoIndicadorRepository")
 *  @UniqueEntity(fields = "valor", message="Este valor ya se encuentra registrado")
 *  @UniqueEntity(fields = "observacion", message="Este valor ya se encuentra registrado")
 */
class SeguimientoIndicador
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_indicador_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

        /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="cb_seguimiento_indicador_valor", type="text", nullable=false)
     */
    private $valor;

     /**
     * @var \indicador
     *
     * @ORM\ManyToOne(targetEntity="IndicadorProceso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_indicador_fkindicador", referencedColumnName="cb_indicador_proceso_id")
     * })
      * @Assert\NotBlank
     */
    private $fkindicador;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_indicador_ano", type="integer", nullable=false)
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="numeric",
     *     message="Solo se aceptan valores numericos"
     * )
     * @Assert\Length(
     *      min = 3,      
     *      max = 4,
     *      minMessage = "Minimo {{ limit }} caracteres",
     *      maxMessage = "Maximo {{ limit }} caracteres"
     * )
     */

    private $ano;
     /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_indicador_mes", type="integer", nullable=false)
      * @Assert\NotBlank
      *      @Assert\Type(
      *     type="numeric",
      *     message="Solo se aceptan valores numericos"
      * )
      *@Assert\Length(
     *      max = 2,
     *      maxMessage = "Maximo {{ limit }} characters")
     */

    private $mes;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_seguimiento_indicador_observacion", type="string", length=150, nullable=false)
     * @Assert\NotBlank
     */
    private $observacion;


    /**
     * @var \responsable
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_indicador_fkresponsable", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkresponsable;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_indicador_estado", type="integer", nullable=false)
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
    public function getFkresponsable(): ?Usuario
    {
        return $this->fkresponsable;
    }
    public function setFkresponsable(?Usuario $fkresponsable): self
    {
        $this->fkresponsable = $fkresponsable;

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
    public function getFkindicador(): ?IndicadorProceso
    {
        return $this->fkindicador;
    }

    public function setFkindicador(?IndicadorProceso $fkindicador): self
    {
        $this->fkindicador = $fkindicador;

        return $this;
    }
    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }
    public function getMes(): ?int
    {
        return $this->mes;
    }

    public function setMes(int $mes): self
    {
        $this->mes = $mes;

        return $this;
    }


    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(string $observacion): self
    {
        $this->observacion = $observacion;

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
