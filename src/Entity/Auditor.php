<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Auditor
 * @ORM\Table(name="cb_aud_auditor", uniqueConstraints={@ORM\UniqueConstraint(name="cb_auditor_id", columns={"cb_auditor_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuditorRepository")
 */
class Auditor
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditor_item", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message = "El valor no debe estar vacio , solo se aceptan valores numericos"
     * )
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_nombres", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_paterno", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_materno", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $materno;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_apellidosnombres", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $apellidosnombres;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_auditorsig", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $auditorsig;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_profesion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $profesion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_auditor_vigente", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $vigente;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditor_estado", type="integer", nullable=false)
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

    public function getItem(): ?int
    {
        return $this->item;
    }
    
    public function setItem(int $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }
    
    public function getPaterno(): ?string
    {
        return $this->paterno;
    }

    public function setPaterno(string $paterno): self
    {
        $this->paterno = $paterno;

        return $this;
    }
    
    public function getMaterno(): ?string
    {
        return $this->materno;
    }

    public function setMaterno(string $materno): self
    {
        $this->materno = $materno;

        return $this;
    }

    public function getApellidosnombres(): ?string
    {
        return $this->apellidosnombres;
    }

    public function setApellidosnombres(string $apellidosnombres): self
    {
        $this->apellidosnombres = $apellidosnombres;

        return $this;
    }  
    
    public function getAuditorsig(): ?string
    {
        return $this->auditorsig;
    }

    public function setAuditorsig(string $auditorsig): self
    {
        $this->auditorsig = $auditorsig;

        return $this;
    }

    public function getProfesion(): ?string
    {
        return $this->profesion;
    }

    public function setProfesion(string $profesion): self
    {
        $this->profesion = $profesion;

        return $this;
    } 

    public function getVigente(): ?string
    {
        return $this->vigente;
    } 

    public function setVigente(string $vigente): self
    {
        $this->vigente = $vigente;

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