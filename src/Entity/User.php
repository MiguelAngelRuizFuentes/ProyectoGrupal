<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apellido1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apellido2;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $dni;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $calle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroDireccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $escaleraPiso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $municipio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $provincia;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codigoPostal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefonoMovil;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefonoFijo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $webPersonal;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $plataformasJuego = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $tiposJuego = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $cuentasSociales = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permisoAlmacenarDatos;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $recibirComunicacionesComerciales;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $recomendacionesHabitosSaludables;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fotoDni;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verificado;

    /**
     * @ORM\OneToMany(targetEntity=Ventaja::class, mappedBy="autor")
     */
    private $ventajas;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalPuntos;

    /**
     * @ORM\OneToMany(targetEntity=Mision::class, mappedBy="usuario")
     */
    private $misions;

    /**
     * @ORM\OneToMany(targetEntity=Mision::class, mappedBy="autor")
     */
    private $misionsAutor;

    /**
     * @ORM\OneToMany(targetEntity=Informe::class, mappedBy="autor")
     */
    private $informesAutor;

    /**
     * @ORM\OneToMany(targetEntity=Informe::class, mappedBy="usuario")
     */
    private $informes;

    /**
     * @ORM\OneToMany(targetEntity=ListaCorreo::class, mappedBy="autor")
     */
    private $listaCorreos;

    /**
     * @ORM\OneToMany(targetEntity=Noticia::class, mappedBy="autorNoticia")
     */
    private $noticias;

    /**
     * @ORM\OneToMany(targetEntity=Evento::class, mappedBy="organizador")
     */
    private $eventosOrganizador;

    /**
     * @ORM\OneToMany(targetEntity=MeInteresa::class, mappedBy="usuario")
     */
    private $meInteresas;

    public function __construct()
    {
        $this->ventajas = new ArrayCollection();
        $this->misions = new ArrayCollection();
        $this->misionsAutor = new ArrayCollection();
        $this->informesAutor = new ArrayCollection();
        $this->informes = new ArrayCollection();
        $this->listaCorreos = new ArrayCollection();
        $this->noticias = new ArrayCollection();
        $this->eventosOrganizador = new ArrayCollection();
        $this->meInteresas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(?string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(?string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(?string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(?string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumeroDireccion(): ?int
    {
        return $this->numeroDireccion;
    }

    public function setNumeroDireccion(?int $numeroDireccion): self
    {
        $this->numeroDireccion = $numeroDireccion;

        return $this;
    }

    public function getEscaleraPiso(): ?string
    {
        return $this->escaleraPiso;
    }

    public function setEscaleraPiso(?string $escaleraPiso): self
    {
        $this->escaleraPiso = $escaleraPiso;

        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(?string $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(?string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getCodigoPostal(): ?int
    {
        return $this->codigoPostal;
    }

    public function setCodigoPostal(?int $codigoPostal): self
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    public function getTelefonoMovil(): ?int
    {
        return $this->telefonoMovil;
    }

    public function setTelefonoMovil(?int $telefonoMovil): self
    {
        $this->telefonoMovil = $telefonoMovil;

        return $this;
    }

    public function getTelefonoFijo(): ?int
    {
        return $this->telefonoFijo;
    }

    public function setTelefonoFijo(?int $telefonoFijo): self
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    public function getWebPersonal(): ?string
    {
        return $this->webPersonal;
    }

    public function setWebPersonal(?string $webPersonal): self
    {
        $this->webPersonal = $webPersonal;

        return $this;
    }

    public function getPlataformasJuego(): ?array
    {
        return $this->plataformasJuego;
    }

    public function setPlataformasJuego(?array $plataformasJuego): self
    {
        $this->plataformasJuego = $plataformasJuego;

        return $this;
    }

    public function getTiposJuego(): ?array
    {
        return $this->tiposJuego;
    }

    public function setTiposJuego(?array $tiposJuego): self
    {
        $this->tiposJuego = $tiposJuego;

        return $this;
    }

    public function getCuentasSociales(): ?array
    {
        return $this->cuentasSociales;
    }

    public function setCuentasSociales(?array $cuentasSociales): self
    {
        $this->cuentasSociales = $cuentasSociales;

        return $this;
    }

    public function getPermisoAlmacenarDatos(): ?bool
    {
        return $this->permisoAlmacenarDatos;
    }

    public function setPermisoAlmacenarDatos(?bool $permisoAlmacenarDatos): self
    {
        $this->permisoAlmacenarDatos = $permisoAlmacenarDatos;

        return $this;
    }

    public function getRecibirComunicacionesComerciales(): ?bool
    {
        return $this->recibirComunicacionesComerciales;
    }

    public function setRecibirComunicacionesComerciales(?bool $recibirComunicacionesComerciales): self
    {
        $this->recibirComunicacionesComerciales = $recibirComunicacionesComerciales;

        return $this;
    }

    public function getRecomendacionesHabitosSaludables(): ?bool
    {
        return $this->recomendacionesHabitosSaludables;
    }

    public function setRecomendacionesHabitosSaludables(?bool $recomendacionesHabitosSaludables): self
    {
        $this->recomendacionesHabitosSaludables = $recomendacionesHabitosSaludables;

        return $this;
    }

    public function getFotoDni(): ?string
    {
        return $this->fotoDni;
    }

    public function setFotoDni(?string $fotoDni): self
    {
        $this->fotoDni = $fotoDni;

        return $this;
    }

    public function getVerificado(): ?bool
    {
        return $this->verificado;
    }

    public function setVerificado(bool $verificado): self
    {
        $this->verificado = $verificado;

        return $this;
    }

    /**
     * @return Collection|Ventaja[]
     */
    public function getVentajas(): Collection
    {
        return $this->ventajas;
    }

    public function addVentaja(Ventaja $ventaja): self
    {
        if (!$this->ventajas->contains($ventaja)) {
            $this->ventajas[] = $ventaja;
            $ventaja->setAutor($this);
        }

        return $this;
    }

    public function removeVentaja(Ventaja $ventaja): self
    {
        if ($this->ventajas->removeElement($ventaja)) {
            // set the owning side to null (unless already changed)
            if ($ventaja->getAutor() === $this) {
                $ventaja->setAutor(null);
            }
        }

        return $this;
    }

    public function getTotalPuntos(): ?int
    {
        return $this->totalPuntos;
    }

    public function setTotalPuntos(int $totalPuntos): self
    {
        $this->totalPuntos = $totalPuntos;

        return $this;
    }

    /**
     * @return Collection|Mision[]
     */
    public function getMisions(): Collection
    {
        return $this->misions;
    }

    public function addMision(Mision $mision): self
    {
        if (!$this->misions->contains($mision)) {
            $this->misions[] = $mision;
            $mision->setUsuario($this);
        }

        return $this;
    }

    public function removeMision(Mision $mision): self
    {
        if ($this->misions->removeElement($mision)) {
            // set the owning side to null (unless already changed)
            if ($mision->getUsuario() === $this) {
                $mision->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mision[]
     */
    public function getMisionsAutor(): Collection
    {
        return $this->misionsAutor;
    }

    public function addMisionsAutor(Mision $misionsAutor): self
    {
        if (!$this->misionsAutor->contains($misionsAutor)) {
            $this->misionsAutor[] = $misionsAutor;
            $misionsAutor->setAutor($this);
        }

        return $this;
    }

    public function removeMisionsAutor(Mision $misionsAutor): self
    {
        if ($this->misionsAutor->removeElement($misionsAutor)) {
            // set the owning side to null (unless already changed)
            if ($misionsAutor->getAutor() === $this) {
                $misionsAutor->setAutor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Informe[]
     */
    public function getInformesAutor(): Collection
    {
        return $this->informesAutor;
    }

    public function addInformesAutor(Informe $informesAutor): self
    {
        if (!$this->informesAutor->contains($informesAutor)) {
            $this->informesAutor[] = $informesAutor;
            $informesAutor->setAutor($this);
        }

        return $this;
    }

    public function removeInformesAutor(Informe $informesAutor): self
    {
        if ($this->informesAutor->removeElement($informesAutor)) {
            // set the owning side to null (unless already changed)
            if ($informesAutor->getAutor() === $this) {
                $informesAutor->setAutor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Informe[]
     */
    public function getInformes(): Collection
    {
        return $this->informes;
    }

    public function addInforme(Informe $informe): self
    {
        if (!$this->informes->contains($informe)) {
            $this->informes[] = $informe;
            $informe->setUsuario($this);
        }

        return $this;
    }

    public function removeInforme(Informe $informe): self
    {
        if ($this->informes->removeElement($informe)) {
            // set the owning side to null (unless already changed)
            if ($informe->getUsuario() === $this) {
                $informe->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ListaCorreo[]
     */
    public function getListaCorreos(): Collection
    {
        return $this->listaCorreos;
    }

    public function addListaCorreo(ListaCorreo $listaCorreo): self
    {
        if (!$this->listaCorreos->contains($listaCorreo)) {
            $this->listaCorreos[] = $listaCorreo;
            $listaCorreo->setAutor($this);
        }

        return $this;
    }

    public function removeListaCorreo(ListaCorreo $listaCorreo): self
    {
        if ($this->listaCorreos->removeElement($listaCorreo)) {
            // set the owning side to null (unless already changed)
            if ($listaCorreo->getAutor() === $this) {
                $listaCorreo->setAutor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Noticia[]
     */
    public function getNoticias(): Collection
    {
        return $this->noticias;
    }

    public function addNoticia(Noticia $noticia): self
    {
        if (!$this->noticias->contains($noticia)) {
            $this->noticias[] = $noticia;
            $noticia->setAutorNoticia($this);
        }

        return $this;
    }

    public function removeNoticia(Noticia $noticia): self
    {
        if ($this->noticias->removeElement($noticia)) {
            // set the owning side to null (unless already changed)
            if ($noticia->getAutorNoticia() === $this) {
                $noticia->setAutorNoticia(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evento[]
     */
    public function getEventosOrganizador(): Collection
    {
        return $this->eventosOrganizador;
    }

    public function addEventosOrganizador(Evento $eventosOrganizador): self
    {
        if (!$this->eventosOrganizador->contains($eventosOrganizador)) {
            $this->eventosOrganizador[] = $eventosOrganizador;
            $eventosOrganizador->setOrganizador($this);
        }

        return $this;
    }

    public function removeEventosOrganizador(Evento $eventosOrganizador): self
    {
        if ($this->eventosOrganizador->removeElement($eventosOrganizador)) {
            // set the owning side to null (unless already changed)
            if ($eventosOrganizador->getOrganizador() === $this) {
                $eventosOrganizador->setOrganizador(null);
            }
        }

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
            $meInteresa->setUsuario($this);
        }

        return $this;
    }

    public function removeMeInteresa(MeInteresa $meInteresa): self
    {
        if ($this->meInteresas->removeElement($meInteresa)) {
            // set the owning side to null (unless already changed)
            if ($meInteresa->getUsuario() === $this) {
                $meInteresa->setUsuario(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->email;
    }
}
