<?php
namespace OpenBackup\Classes;

/**
 * Backup Class
 * 
 */
class Backup {
    // Properties
    private array $excludedFolders = [];
    private array $excludedFileTypes = [];
    private bool $databaseOnly = false;
    private BackupStorage $storage; // Added storage property

    // Constructor
    public function __construct() {
       // You can add default values or initialization logic here
    }

    // Getters and Setters for excludedFolders
    /**
     * Get the list of excluded folders.
     *
     * @return array
     */
    public function getExcludedFolders(): array {
        return $this->excludedFolders;
    }

    /**
     * Set the list of excluded folders.
     *
     * @param array $excludedFolders
     */
    public function setExcludedFolders(array $excludedFolders): void {
        $this->excludedFolders = $excludedFolders;
    }

    /**
     * Get the list of excluded file types.
     *
     * @return array
     */
    public function getExcludedFileTypes(): array {
        return $this->excludedFileTypes;
    }

    /**
     * Set the list of excluded file types.
     *
     * @param array $excludedFileTypes
     */
    public function setExcludedFileTypes(array $excludedFileTypes): void {
        $this->excludedFileTypes = $excludedFileTypes;
    }

    /**
     * Check if the backup is for the database only.
     *
     * @return bool
     */
    public function isDatabaseOnly(): bool {
        return $this->databaseOnly;
    }

    /**
     * Set whether the backup is for the database only.
     *
     * @param bool $databaseOnly
     */
    public function setDatabaseOnly(bool $databaseOnly): void {
        $this->databaseOnly = $databaseOnly;
    }

    // Getter and Setter for storage
    /**
     * Get the backup storage type.
     *
     * @return BackupStorage
     */
    public function getStorage(): BackupStorage {
        return $this->storage;
    }

    /**
     * Set the backup storage type.
     *
     * @param BackupStorage $storage
     */
    public function setStorage(BackupStorage $storage): void {
        $this->storage = $storage;
    }

    // Method to store backup
    public function storeBackup(): void {
        $this->storage->storeBackup($this);
    }

    // Method to retrieve backup
    public function retrieveBackup(): void {
        $this->storage->retrieveBackup();
    }    
}