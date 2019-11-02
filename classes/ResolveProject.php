<?php
/**
 * ResolveProject class inherits
 * all the properties and methods
 * of Project and declares new
 * method to change the project's
 * state to resolved
 */
class ResolveProject extends Project
{
    /**
     * Changes the project's state
     * to resolved by its data
     * @param array $data
     * @uses self::FILE_NAME
     * @uses self::PROJECT_STATUS_RESOLVED
     * @return void
     */
    public static function resolve(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        $projects->{$data['project-id']}->{'target-lang-text'} = $data['target-lang-text'];
        $projects->{$data['project-id']}->status = self::PROJECT_STATUS_RESOLVED;
                
        $modelJson->writeJson($projects);
    }
}
