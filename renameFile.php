<?php
/**
 * Created by PhpStorm.
 * User: Mohammed Ndiaye
 * Date: 24/03/2020
 * Time: 18:11
 */

class RenameFile
{
    /**
     * Rename file
     * @param $baseDir @Exemple "./temp/folder'
     * @param $srcFile
     */
    private static function renameImage($basePath, $srcFile){
        //$newName = str_replace(" ","-", trim($srcFile));
        $newName = self::normalize($srcFile);
        // Checking If File Already Exists
        if (file_exists($basePath.'/'.$newName)) {
            echo "Error While Renaming (File already exists)". $basePath.'/'.$srcFile ."<br>" ;
        } else {
            if (rename($basePath.'/'.$srcFile, $basePath.'/'.$newName)) {
                echo "Successfully Renamed : $basePath.'/'.$srcFile to : $newName <br>" ;
            } else {
                echo "A File With The Same Name Already Exists<br>" ;
            }
        }

    }

    /**
     * Iterate folder recursively and rename file
     * @param $baseDir
     *
     */
    public static  function iterateFolder($baseDir){
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir));

        foreach ($rii as $file) {

            if ($file->isDir() || $file == '.' || $file == '..'){
                continue;
            }

            $basePath = $file->getPath();
            $oldFile = $file->getFilename();
            self::renameImage($basePath, $oldFile);
        }
    }

    private static function normalize ($str) {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '*'=>'x', '/'=>'_', '  '=>'-', ' '=> '-', '--'=>'-',
        );

        $result = strtr(utf8_encode($str), $table);
        return trim($result);
    }

}


echo "Start renaming images...<br><br>";
RenameFile::iterateFolder("./tmp");
echo "<br><br>END renaming images !<br><br>";

