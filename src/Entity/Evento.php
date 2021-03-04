<?php

namespace App\Entity;

use App\Repository\EventoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventoRepository::class)
 */
class Evento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $destacado;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="eventosOrganizador")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organizador;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $enlace;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaHoraComienzo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagenEvento;

    /**
     * @ORM\OneToMany(targetEntity=MeInteresa::class, mappedBy="evento")
     */
    private $meInteresas;

    public function __construct()
    {
        $this->meInteresas = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidado(): ?bool
    {
        return $this->validado;
    }

    public function setValidado(bool $validado): self
    {
        $this->validado = $validado;

        return $this;
    }

    public function getDestacado(): ?bool
    {
        return $this->destacado;
    }

    public function setDestacado(bool $destacado): self
    {
        $this->destacado = $destacado;

        return $this;
    }

    public function getOrganizador(): ?User
    {
        return $this->organizador;
    }

    public function setOrganizador(?User $organizador): self
    {
        $this->organizador = $organizador;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getEnlace(): ?string
    {
        return $this->enlace;
    }

    public function setEnlace(?string $enlace): self
    {
        $this->enlace = $enlace;

        return $this;
    }

    public function getFechaHoraComienzo(): ?\DateTimeInterface
    {
        return $this->fechaHoraComienzo;
    }

    public function setFechaHoraComienzo(\DateTimeInterface $fechaHoraComienzo): self
    {
        $this->fechaHoraComienzo = $fechaHoraComienzo;

        return $this;
    }

    public function getImagenEvento(): ?string
    {
        return $this->imagenEvento;
    }

    public function setImagenEvento(string $imagenEvento): self
    {
        $this->imagenEvento = $imagenEvento;

        return $this;
    }

    /**
     * @return Collection|MeInteresa[]
     */
    public function getMeInteresas(): Collection
    {
        return $this->meInteresas;
    }

    public function addMeInteresa(MeInteresa $meInteresa): self
    {
        if (!$this->meInteresas->contains($meInteresa)) {
            $this->meInteresas[] = $meInteresa;
            $meInteresa->setEvento($this);
        }

        return $this;
    }

    public function removeMeInteresa(MeInteresa $meInteresa): self
    {
        if ($this->meInteresas->removeElement($meInteresa)) {
            // set the owning side to null (unless already changed)
            if ($meInteresa->getEvento() === $this) {
                $meInteresa->setEvento(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->tipo;
    }

}
