<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Correlativo 
 * @ORM\Table(name="cb_correlativo_correlativo", uniqueConstraints={@ORM\UniqueConstraint(name="cb_correlativo_id", columns={"cb_correlativo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CorrelativoRepository")
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
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correlativo_fksolicitante", referencedColumnName="cb_usuario_id", nullable=true)
     * })
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
     *   @ORM\JoinColumn(name="cb_correlativo_fkcorrelativo", referencedColumnName="cb_control_correlativo_id", nullable=true)
     * })
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
     * @ORM\Column(name="cb_correlativo_ip", type="text", nullable=false)
         * @Assert\NotBlank
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_antecedente", type="text", nullable=true)
         * @Assert\NotBlank
     */
    private $antecedente;
/**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_estadocorrelativo", type="text", nullable=true)
         * @Assert\NotBlank
     */
    private $estadocorrelativo;

    /**
     * @var int
     * @Assert\Type(
     *     type="numeric",
     *     message="Tiene que ingresar un valor númerico válido"
     * )
     * @ORM\Column(name="cb_correlativo_item", type="integer", nullable=true)
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correlativo_urleditable", type="text", nullable=true)
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
     * @ORM\Column(name="cb_correlativo_urlorigen", type="text", nullable=true)
     */
    private $urlorigen;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_correlativo_estado", type="integer", nullable=true)
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

    public function getNumcorrelativo(): ?int
    {
        return $this->numcorrelativo;
    }

    public function setNumcorrelativo(string $numcorrelativo): self
    {
        $this->numcorrelativo = $numcorrelativo;

        return $this;
    }

    public function getFechareg(): ?\DateTimeInterface
    {
        return $this->fechareg;
    }

    public function setFechareg(\DateTimeInterface $fechareg): self
    {
        $this->fechareg = $fechareg;

        return $this;
    }

    public function getFksolicitante(): ?Usuario
    {
        return $this->fksolicitante;
    }

    public function setFksolicitante(?Usuario $fksolicitante): self
    {
        $this->fksolicitante = $fksolicitante;

        return $this;
    }

    public function getRedactor(): ?string
    {
        return $this->redactor;
    }

    public function setRedactor(string $redactor): self
    {
        $this->redactor = $redactor;

        return $this;
    }

    public function getDestinatario(): ?string
    {
        return $this->destinatario;
    }

    public function setDestinatario(string $destinatario): self
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getFkcorrelativo(): ?ControlCorrelativo
    {
        return $this->fkcorrelativo;
    }

    public function setFkcorrelativo(?ControlCorrelativo $fkcorrelativo): self
    {
        $this->fkcorrelativo = $fkcorrelativo;

        return $this;
    }

    public function getFktiponota(): ?TipoNota
    {
        return $this->fktiponota;
    }

    public function setFktiponota(?TipoNota $fktiponota): self
    {
        $this->fktiponota = $fktiponota;

        return $this;
    }

   

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAntecedente(): ?string
    {
        return $this->antecedente;
    }

    public function setAntecedente(string $antecedente): self
    {
        $this->antecedente = $antecedente;

        return $this;
    }

    public function getEstadoCorrelativo(): ?string
    {
        return $this->estadocorrelativo;
    }

    public function setEstadoCorrelativo(string $estadocorrelativo): self
    {
        $this->estadocorrelativo = $estadocorrelativo;

        return $this;
    }

    public function getItem(): ?int
    {
        return $this->item;
    }

    public function setItem(int $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getUrleditable(): ?string
    {
        return $this->urleditable;
    }

    public function setUrleditable(string $urleditable): self
    {
        $this->urleditable = $urleditable;

        return $this;
    }

    public function getEntrega(): ?\DateTimeInterface
    {
        return $this->entrega;
    }

    public function setEntrega(\DateTimeInterface $entrega): self
    {
        $this->entrega = $entrega;

        return $this;
    }

    public function getFkunidad(): ?Unidad
    {
        return $this->fkunidad;
    }

    public function setFkunidad(?Unidad $fkunidad): self
    {
        $this->fkunidad = $fkunidad;

        return $this;
    }

    public function getUrlorigen(): ?string
    {
        return $this->urlorigen;
    }

    public function setUrlorigen(string $urlorigen): self
    {
        $this->urlorigen = $urlorigen;

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