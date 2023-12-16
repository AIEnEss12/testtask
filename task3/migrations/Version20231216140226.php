<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231216140226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        if (! $schema->hasTable('manager')) {
            return;
        }

        $managerTable = $schema->getTable('manager');

        if (! $managerTable->hasColumn('birthdate')) {
            $managerTable->addColumn('birthdate', 'date', [
                'notnull' => false,
                'default' => null,
            ]);
        }
    }

    public function down(Schema $schema): void
    {
        if (! $schema->hasTable('manager')) {
            return;
        }

        $managerTable = $schema->getTable('manager');

        if ($managerTable->hasColumn('birthdate')) {
            $managerTable->dropColumn('birthdate');
        }

    }
}
