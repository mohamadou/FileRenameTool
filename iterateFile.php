<?php

class IterateFile{

    public $baseDir;
    public function __construct($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * Iterate folder recursively and rename file
     * @param $baseDir
     *
     */
    public  function getFiles(){
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->baseDir));

        $files = array();
        foreach ($rii as $file) {

            if ($file->isDir() || $file == '.' || $file == '..'){
                continue;
            }


            $filePath = $file->getPathname();
            $fileName = $file->getFilename();
            $subPathName = $rii->getSubPathName();


            $files[] = array(
                'fileName' => $fileName,
                'filePath' => $subPathName,
                'imgPath' => '../tmp/'.$subPathName,
            );
        }
        return $files;
    }
}