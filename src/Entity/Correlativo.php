<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Correlativo
 * @ORM\Table(name="cb_procesos_correlativo", indexes={@ORM\Index(name="cb_correlativo_id", columns={"cb_correlativo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CorrelativoRepository")
 *  @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class Correlativo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_correlativo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_correlativo_numcorrelativo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numcorrelativo;
    
    /**
     * @var date
     *
     * @ORM\Column(name="cb_correlativo_fechareg", type="date", nullable=false)
     */
    private $fechareg;

    /**
     * @var \solicitante
     *
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fksolicitante", referencedColumnName="cb_personal_id")
     * })
     * @Assert\NotBlank
     */
    private $fksolicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_redactor", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $redactor;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_destinatario", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $destinatario;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_referencia", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $referencia;
    
    /**
     * @var \correlativo
     *
     * @ORM\ManyToOne(targetEntity="ControlCorrelativo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fkcorrelativo", referencedColumnName="cb_control_correlativo_id")
     * })
     * @Assert\NotBlank
     */
    private $fkcorrelativo;

    /**
     * @var \tiponota
     *
     * @ORM\ManyToOne(targetEntity="TipoNota")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fktiponota", referencedColumnName="cb_tipo_nota_id")
     * })
     * @Assert\NotBlank
     */
    private $fktiponota;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_equipo", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $equipo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_ip", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $ip;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_url", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_antecedente", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $antecedente;

    /**
     * @var \estado
     *
     * @ORM\ManyToOne(targetEntity="EstadoCorrelativo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fkestado", referencedColumnName="cb_estado_correlativo_id")
     * })
     * @Assert\NotBlank
     */
    private $fkestado;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_correlativo_item", type="integer", nullable=false)
     */
    private $item;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_urleditable", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $urleditable;
    
    /**
     * @var date
     *
     * @ORM\Column(name="cb_correlativo_entrega", type="date", nullable=false)
     */
    private $entrega;

    /**
     * @var \unidad
     *
     * @ORM\ManyToOne(targetEntity="Unidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fkunidad", referencedColumnName="cb_unidad_id")
     * })
     * @Assert\NotBlank
     */
    private $fkunidad;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_urlorigen", type="text", nullable=false)
       * @Assert\NotBlank
     */
    private $urlorigen;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_correlativo_estado", type="integer", nullable=false)
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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

    public function getFkgerencia(): ?Gerencia
    {
        return $this->fkgerencia;
    }

    public function setFkgerencia(?Gerencia $fkgerencia): self
    {
        $this->fkgerencia = $fkgerencia;

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