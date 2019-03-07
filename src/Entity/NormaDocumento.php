<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * NormaDocumento
 * @ORM\Table(name="cb_gestion_norma_documento", indexes={@ORM\Index(name="cb_norma_documento_id", columns={"cb_norma_documento_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\NormaDocumentoRepository")
 */
class NormaDocumento
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_norma_documento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_norma_documento_fkdocumento", referencedColumnName="cb_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fkdocumento;

    /**
     * @var \norma
     *
     * @ORM\ManyToOne(targetEntity="TipoNorma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_norma_documento_fknorma", referencedColumnName="cb_tipo_norma_id")
     * })
     * @Assert\NotBlank
     */
    private $fknorma;


    /**
     * @var string
     *
     * @ORM\Column(name="cb_norma_documento_punto", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    private $punto;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_norma_documento_estado", type="integer", nullable=false)
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
    public function getFkdocumento(): ?Documento
    {
        return $this->fkdocumento;
    }

    public function setFkdocumento(?Documento $fkdocumento): self
    {
        $this->fkdocumento = $fkdocumento;

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
    public function getPunto(): ?string
    {
        return $this->punto;
    }

    public function setPunto(string $punto): self
    {
        $this->punto = $punto;

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
