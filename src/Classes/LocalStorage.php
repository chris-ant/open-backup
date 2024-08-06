<?php
namespace OpenBackup\Classes;
use OpenBackup\Classes\BackupStorage;

/**
 * Class LocalStorage
 *
 * Represents a local backup storage.
 */
class LocalStorage extends BackupStorage {
    public function storeBackup(Backup $backup): void {
        // Logic to store backup locally
        echo "Backup stored locally.\n";
    }

    public function retrieveBackup(): Backup {
        // Logic to retrieve backup from local storage
        echo "Backup retrieved from local storage.\n";
        return new Backup();
    }
}