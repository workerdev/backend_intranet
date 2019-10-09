<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="cb_personal_nombre", type="string", length=150, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_personal_apellido", type="string", length=150, nullable=true)
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

    /**
     * @var \sector
     *
     * @ORM\ManyToOne(targetEntity="Sector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_personal_fksector", referencedColumnName="cb_sector_id")
     * })
     * @Assert\NotBlank
     */
    private $fksector;

    /**
     * @var \area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_personal_fkarea", referencedColumnName="cb_area_id")
     * })
     * @Assert\NotBlank
     */
    private $fkarea;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_personal_genero", type="string", length=20, nullable=true)
     * @Assert\NotBlank
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_personal_username", type="string", length=50, nullable=true)
     * @Assert\NotBlank
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_personal_foto", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $foto;


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
    
    public function getFksector(): ?Sector
    {
        return $this->fksector;

    }

    public function setFksector(?Sector $fksector): self
    {
        $this->fksector = $fksector;

        return $this;
    }
    
    public function getFkarea(): ?Area
    {
        return $this->fkarea;

    }

    public function setFkarea(?Area $fkarea): self
    {
        $this->fkarea = $fkarea;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }
}