<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305174429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evento (id INT AUTO_INCREMENT NOT NULL, organizador_id INT NOT NULL, validado TINYINT(1) NOT NULL, destacado TINYINT(1) NOT NULL, tipo VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, enlace VARCHAR(255) DEFAULT NULL, fecha_hora_comienzo DATETIME NOT NULL, imagen_evento VARCHAR(255) NOT NULL, INDEX IDX_47860B05E3445778 (organizador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE informe (id INT AUTO_INCREMENT NOT NULL, autor_id INT NOT NULL, usuario_id INT NOT NULL, campos LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_7E75E1D914D45BBE (autor_id), INDEX IDX_7E75E1D9DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lista_correo (id INT AUTO_INCREMENT NOT NULL, autor_id INT NOT NULL, correos LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_C23F700814D45BBE (autor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE me_interesa (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, evento_id INT NOT NULL, interesa TINYINT(1) NOT NULL, INDEX IDX_E230AA5DB38439E (usuario_id), INDEX IDX_E230AA587A5F842 (evento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mision (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, autor_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, puntos INT NOT NULL, completada TINYINT(1) NOT NULL, INDEX IDX_E7696CF1DB38439E (usuario_id), INDEX IDX_E7696CF114D45BBE (autor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticia (id INT AUTO_INCREMENT NOT NULL, autor_noticia_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, imagen_destacada VARCHAR(255) NOT NULL, texto_noticia LONGTEXT NOT NULL, fecha_publicacion DATE NOT NULL, INDEX IDX_31205F96CD263EBE (autor_noticia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nombre VARCHAR(255) DEFAULT NULL, apellido1 VARCHAR(255) DEFAULT NULL, apellido2 VARCHAR(255) DEFAULT NULL, dni VARCHAR(15) DEFAULT NULL, fecha_nacimiento DATE DEFAULT NULL, genero VARCHAR(255) DEFAULT NULL, calle VARCHAR(255) DEFAULT NULL, numero_direccion INT DEFAULT NULL, escalera_piso VARCHAR(255) DEFAULT NULL, municipio VARCHAR(255) DEFAULT NULL, provincia VARCHAR(255) DEFAULT NULL, codigo_postal INT DEFAULT NULL, telefono_movil INT DEFAULT NULL, telefono_fijo INT DEFAULT NULL, web_personal VARCHAR(255) DEFAULT NULL, plataformas_juego LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', tipos_juego LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', cuentas_sociales LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', permiso_almacenar_datos TINYINT(1) DEFAULT NULL, recibir_comunicaciones_comerciales TINYINT(1) DEFAULT NULL, recomendaciones_habitos_saludables TINYINT(1) DEFAULT NULL, foto_dni VARCHAR(255) DEFAULT NULL, verificado TINYINT(1) NOT NULL, total_puntos INT NOT NULL, nombre_jugador VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventaja (id INT AUTO_INCREMENT NOT NULL, autor_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, nombre_empresa VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, imagen VARCHAR(255) NOT NULL, enlace VARCHAR(255) NOT NULL, codigo_descuento VARCHAR(255) DEFAULT NULL, INDEX IDX_6400299514D45BBE (autor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evento ADD CONSTRAINT FK_47860B05E3445778 FOREIGN KEY (organizador_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE informe ADD CONSTRAINT FK_7E75E1D914D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE informe ADD CONSTRAINT FK_7E75E1D9DB38439E FOREIGN KEY (usuario_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE lista_correo ADD CONSTRAINT FK_C23F700814D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE me_interesa ADD CONSTRAINT FK_E230AA5DB38439E FOREIGN KEY (usuario_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE me_interesa ADD CONSTRAINT FK_E230AA587A5F842 FOREIGN KEY (evento_id) REFERENCES evento (id)');
        $this->addSql('ALTER TABLE mision ADD CONSTRAINT FK_E7696CF1DB38439E FOREIGN KEY (usuario_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE mision ADD CONSTRAINT FK_E7696CF114D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE noticia ADD CONSTRAINT FK_31205F96CD263EBE FOREIGN KEY (autor_noticia_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ventaja ADD CONSTRAINT FK_6400299514D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE me_interesa DROP FOREIGN KEY FK_E230AA587A5F842');
        $this->addSql('ALTER TABLE evento DROP FOREIGN KEY FK_47860B05E3445778');
        $this->addSql('ALTER TABLE informe DROP FOREIGN KEY FK_7E75E1D914D45BBE');
        $this->addSql('ALTER TABLE informe DROP FOREIGN KEY FK_7E75E1D9DB38439E');
        $this->addSql('ALTER TABLE lista_correo DROP FOREIGN KEY FK_C23F700814D45BBE');
        $this->addSql('ALTER TABLE me_interesa DROP FOREIGN KEY FK_E230AA5DB38439E');
        $this->addSql('ALTER TABLE mision DROP FOREIGN KEY FK_E7696CF1DB38439E');
        $this->addSql('ALTER TABLE mision DROP FOREIGN KEY FK_E7696CF114D45BBE');
        $this->addSql('ALTER TABLE noticia DROP FOREIGN KEY FK_31205F96CD263EBE');
        $this->addSql('ALTER TABLE ventaja DROP FOREIGN KEY FK_6400299514D45BBE');
        $this->addSql('DROP TABLE evento');
        $this->addSql('DROP TABLE informe');
        $this->addSql('DROP TABLE lista_correo');
        $this->addSql('DROP TABLE me_interesa');
        $this->addSql('DROP TABLE mision');
        $this->addSql('DROP TABLE noticia');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE ventaja');
    }
}
