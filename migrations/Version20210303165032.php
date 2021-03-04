<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303165032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mision (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, autor_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, puntos INT NOT NULL, completada TINYINT(1) NOT NULL, INDEX IDX_E7696CF1DB38439E (usuario_id), INDEX IDX_E7696CF114D45BBE (autor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nombre VARCHAR(255) DEFAULT NULL, apellido1 VARCHAR(255) DEFAULT NULL, apellido2 VARCHAR(255) DEFAULT NULL, dni VARCHAR(15) DEFAULT NULL, fecha_nacimiento DATE DEFAULT NULL, genero VARCHAR(255) DEFAULT NULL, calle VARCHAR(255) DEFAULT NULL, numero_direccion INT DEFAULT NULL, escalera_piso VARCHAR(255) DEFAULT NULL, municipio VARCHAR(255) DEFAULT NULL, provincia VARCHAR(255) DEFAULT NULL, codigo_postal INT DEFAULT NULL, telefono_movil INT DEFAULT NULL, telefono_fijo INT DEFAULT NULL, web_personal VARCHAR(255) DEFAULT NULL, plataformas_juego LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', tipos_juego LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', cuentas_sociales LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', permiso_almacenar_datos TINYINT(1) DEFAULT NULL, recibir_comunicaciones_comerciales TINYINT(1) DEFAULT NULL, recomendaciones_habitos_saludables TINYINT(1) DEFAULT NULL, foto_dni VARCHAR(255) DEFAULT NULL, verificado TINYINT(1) NOT NULL, total_puntos INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventaja (id INT AUTO_INCREMENT NOT NULL, autor_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, nombre_empresa VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, imagen VARCHAR(255) NOT NULL, enlace VARCHAR(255) NOT NULL, codigo_descuento VARCHAR(255) DEFAULT NULL, INDEX IDX_6400299514D45BBE (autor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mision ADD CONSTRAINT FK_E7696CF1DB38439E FOREIGN KEY (usuario_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE mision ADD CONSTRAINT FK_E7696CF114D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ventaja ADD CONSTRAINT FK_6400299514D45BBE FOREIGN KEY (autor_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mision DROP FOREIGN KEY FK_E7696CF1DB38439E');
        $this->addSql('ALTER TABLE mision DROP FOREIGN KEY FK_E7696CF114D45BBE');
        $this->addSql('ALTER TABLE ventaja DROP FOREIGN KEY FK_6400299514D45BBE');
        $this->addSql('DROP TABLE mision');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE ventaja');
    }
}
