<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-8-6
 * Time: 下午10:57
 * To change this template use File | Settings | File Templates.
 */

class File extends FileDir {

    /**
     *
     */
    public function createFile($fileName)
    {
        $fileIsExist = $this->checkFileExists($fileName);
        if ($fileIsExist == true) {
            self::$_error = self::$_fileIndex == 1 ? '文件已存在！' : '创建文件与目录名冲突';
            return false;
        }

        return false !== touch($fileName) ? true : false;
    }

    /**
     * @desc 获取文件的大小
     * @param $fileName
     * @return bool
     */
    public function getFileSize($fileName)
    {
        return $this->calculateFileSize($fileName);
    }

    /**
     * @desc 删除文件
     *
     * @param $fileName
     * @return bool
     */
    public function delFile($fileName)
    {
        //$isExists = $this->checkFileExists($fileName);
        return false !== unlink($fileName) ? true : false;
    }

    /**
     * @desc 重命名一个文件或目录, 只限于当前目录，源文件会消失
     *
     * @param $fileName
     * @param $newFileName
     * @return bool
     */
    public function moveFile($fileName, $newFileName)
    {
        $fileExists = $this->checkFileExists($fileName);

        if (!$fileExists) {
            return false;
        }

        $srcFileIndex = self::$_fileIndex;
        $currentPath = dirname($fileName);
        $newPath = $currentPath . '/' . $newFileName;

        if ($this->checkFileExists($newPath)) {
            $newFileIndex = self::$_fileIndex;
            self::$_error = $srcFileIndex < $newFileIndex ? '重命名文件名称与当前目录名冲突！' : '重命名目录名与当前目录文件名冲突！';
            return false;
        }

        if (false === rename($fileName, $newFileName)) {
            self::$_error = $fileName . '重命名失败！';
            return false;
        }
        return true;
    }

    //源文件只能是文件，不能是目录
    public function copyFile($file, $destDir)
    {
        $newFile = $destDir . '/' . $file;
        if ($this->checkFileExists($newFile)) {
            self::$_error = '目标文件已存在！';
            return false;
        }

        if (false === copy($file, $newFile)) {
            self::$_error = $file . '复制失败！';
            return false;
        }

        return true;
    }

    /**
     * @desc 下载文件
     *
     * @param $file
     */
    public function downLoadFile($fileName)
    {
        //$fileExists = $this->checkFileExists($file);
        header('Content-type: image/gif');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    }
}

