<?php
/**
 * DeleteProject class inherits
 * all the properties and methods
 * of Project and declares new
 * methods to delete a project by
 * the passed id
 */
class DeleteProject extends Project
{
    /**
     * Deletes a project
     * @param string $projectId
     * @uses deleteJson()
     * @uses deleteTxt()
     * @return void
     */
    public static function delete(string $projectId): void
    {
        self::deleteJson($projectId);
        self::deleteTxt($projectId);
    }
    /**
     * Deletes the json data
     * of a project by its id
     * @param string $projectId
     * @uses FILE_NAME
     * @return void
     */
    private static function deleteJson(string $projectId): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        self::dicCounter($projects->{$projectId}->assignment);
        unset($projects->{$projectId});
        $modelJson->writeJson($projects); 
    }
    /**
     * Deletes the text 
     * of a project by its id
     * @param string $projectId
     * @return void
     */
    private static function deleteTxt(string $projectId): void
    {
        try {
            FileAccessModel::deleteDir($projectId);
        } catch (Exception $e) {
            echo $e->getMessage();
        };
    }
}
