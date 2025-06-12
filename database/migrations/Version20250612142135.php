<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250612142135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE empresas (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefone VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE empresa_categoria (empresa_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_42A68052521E1991 (empresa_id), INDEX IDX_42A680523397707A (categoria_id), PRIMARY KEY(empresa_id, categoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE enderecos (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, logradouro VARCHAR(255) NOT NULL, INDEX IDX_FC4E02DA521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A68052521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A680523397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE enderecos ADD CONSTRAINT FK_FC4E02DA521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE empresa_categoria DROP FOREIGN KEY FK_42A68052521E1991
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE empresa_categoria DROP FOREIGN KEY FK_42A680523397707A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE enderecos DROP FOREIGN KEY FK_FC4E02DA521E1991
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categorias
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE empresas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE empresa_categoria
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE enderecos
        SQL);
    }
}
