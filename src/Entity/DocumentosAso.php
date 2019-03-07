<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * DocumentosAso
 * @ORM\Table(name="cb_fc_documentosaso", indexes={@ORM\Index(name="cb_documentosaso_id", columns={"cb_documentosaso_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DocumentosAsoRepository")
 */
class DocumentosAso
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_documentosaso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
     /**
     * @var \fichacargo
     *
     * @ORM\ManyToOne(targetEntity="FichaCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_documentosaso_fkfichacargo", referencedColumnName="cb_ficha_cargo_id")
     * })
      * @Assert\NotBlank
     */
    private $fkfichacargo;
    /**
    * @var \documento
    *
    * @ORM\ManyToOne(targetEntity="Documento")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="cb_documentosaso_fkdocumento", referencedColumnName="cb_documento_id")
    * })
     * @Assert\NotBlank
    */
   private $fkdocumento;
    
  

    /**
     * @var int
     *
     * @ORM\Column(name="cb_documentosaso_estado", type="integer", nullable=false)
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


    public function getFkfichacargo(): ?FichaCargo
    {
        return $this->fkfichacargo;
    }

    public function setFkfichacargo(?FichaCargo $fkfichacargo): self
    {
        $this->fkfichacargo = $fkfichacargo;

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

   

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

  
}
