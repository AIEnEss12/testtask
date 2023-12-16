<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231216122127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Generate two entities manager and order';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE IF NOT EXISTS manager_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE IF NOT EXISTS "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE IF NOT EXISTS manager (
            id INT NOT NULL, 
            first_name VARCHAR(255) NOT NULL, 
            last_name VARCHAR(255) DEFAULT NULL, 
            birthdate VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)
        )');

        $this->addSql('CREATE TABLE IF NOT EXISTS "order" (
            id INT NOT NULL, 
            name VARCHAR(255) NOT NULL, 
            manager_id INT NOT NULL, 
            PRIMARY KEY(id), 
            CONSTRAINT FK_12345 FOREIGN KEY (manager_id) REFERENCES manager (id)
        )');

        // Добавление внешнего ключа и проверки для manager_id
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_manager_id FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT CHK_manager_id CHECK (manager_id > 0)');
    }

    public function postUp(Schema $schema): void
    {
        $this->addFixture(new LoadMyData());
    }


    public function down(Schema $schema): void
    {
        if ($schema->hasTable('order')) {
            $this->addSql('DROP TABLE "order"');
        }

        if ($schema->hasTable('manager')) {
            $this->addSql('DROP  TABLE manager');
        }

        if (! $schema->hasTable('manager_id_seq')) {
            $this->addSql('DROP SEQUENCE manager_id_seq CASCADE');
        }

        if (! $schema->hasTable('order_id_seq')) {
            $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        }
    }
}
