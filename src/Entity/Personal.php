<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
* Personal
* @ORM\Table(name="cb_personal_personal", indexes={@ORM\Index(name="cb_personal_fkcargo", columns={"cb_personal_fkcargo"})})
* @ORM\Entity(repositoryClass="App\Repository\PersonalRepository")
*/
class Personal
{
   /**
    * @var int
    *
    * @ORM\Column(name="cb_personal_id", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
   private $id;

   /**
    * @var string
    *
    * @ORM\Column(name="cb_personal_nombre", type="string", length=50, nullable=false)
    * @Assert\NotBlank
    */
   private $nombre;

   /**
    * @var string
    *
    * @ORM\Column(name="cb_personal_apellido", type="string", length=50, nullable=true)
    * @Assert\NotBlank
    */
   private $apellido;
    /**
    * @var int
    *
    * @ORM\Column(name="cb_personal_ci", type="integer")
     * @Assert\NotBlank(
     *     message = "Este no deberia estar vacio y solo se permite valores numericos"
     * )
    */
   private $ci;

   /**
    * @var string
    *
    * @ORM\Column(name="cb_personal_correo", type="string", length=150, nullable=true)
    *
    */
   private $correo;
   /**
    * @var int
    *
    * @ORM\Column(name="cb_personal_telefono", type="integer", nullable=true)
    *
    */
   private $telefono;

    /**
    * @var date
    *
    * @ORM\Column(name="cb_personal_fnac", type="date", nullable=true)
    */
    private $fnac;

   /**
    * @var int
    *
    * @ORM\Column(name="cb_personal_estado", type="integer", nullable=false)
    */
   private $estado;


    /**
    * @var \procesoscargo
    *
    * @ORM\ManyToOne(targetEntity="PersonalCargo")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="cb_personal_fkcargo", referencedColumnName="cb_cargo_id")
    * })
     * @Assert\NotBlank
     *
    */

   private $fkprocesoscargo;

    /**
    * @var \estadopersonal
    *
    * @ORM\ManyToOne(targetEntity="EstadoPersonal")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="cb_personal_fkestado", referencedColumnName="cb_estado_personal_id")
    * })
     * @Assert\NotBlank
    */
   private $fkestadopersonal;


   public function getId(): ?int
   {
       return $this->id;
   }
   public function setId(int $id): self
   {
       $this->id = $id;

       return $this;
   }

   public function getFnac(): ?\DateTimeInterface
   {
       return $this->fnac;
   }

   public function setFnac(\DateTimeInterface $fnac): self
   {
       $this->fnac = $fnac;

       return $this;
   }
   public function getApellido(): ?string
   {
       return $this->apellido;
   }

   public function setApellido(string $apellido): self
   {
       $this->apellido = $apellido;

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
   public function getTelefono(): ?int
   {
       return $this->telefono;
   }

   public function setTelefono(int $telefono): self
   {
       $this->telefono = $telefono;

       return $this;
   }
   public function getCi(): ?int
   {
       return $this->ci;
   }

   public function setCi(int $ci): self
   {
       $this->ci = $ci;

       return $this;
   }

   public function getCorreo(): ?string
   {
       return $this->correo;
   }

   public function setCorreo(string $correo): self
   {
       $this->correo = $correo;

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

   public function getFkPersonalCargo(): ?PersonalCargo
   {
       return $this->fkprocesoscargo;
   }

   public function setFkPersonalCargo(?PersonalCargo $fkprocesoscargo): self
   {
       $this->fkprocesoscargo = $fkprocesoscargo;

       return $this;
   }
   public function getFkestadopersonal(): ?EstadoPersonal
   {
       return $this->fkestadopersonal;

}

   public function setFkestadopersonal(?EstadoPersonal $fkestadopersonal): self
   {
       $this->fkestadopersonal = $fkestadopersonal;

       return $this;
   }
}