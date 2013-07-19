<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-8-6
 * Time: 下午10:57
 * To change this template use File | Settings | File Templates.
 */

class Dir extends fileDir {

    /**
     * @desc 返回目录结构与文件大小
     *
     * @param string $dirName
     * @return array|bool
     */
    public function readDir($dirName = '.')
    {
        if (!$this->checkFileExists($dirName) || self::$_fileIndex == 1) {
            return false;
        }

        $fileArgs = $dirArgs = $dirContent = array();
        //$dirArgs['dir'][] = '..';
        $handle = opendir($dirName);

        while (false !== $file = readdir($handle)) {
            if ($file != '.') {
                $subFile = $dirName . '/' . $file;
                if (is_dir($subFile)) {
                    $dirArgs['dir'][] = $file;
                } else {
                    //$filePath = $allPath ? $file : $subFile; , $allPath = 0
                    $fileArgs['file'][] = $file;
                }
            }
        }

        closedir($handle);


        if (!empty($fileArgs) || !empty($dirArgs)) {
            $dirContent = array_merge($fileArgs, $dirArgs);
        }

        $dirContent = empty($dirContent) ? array('dir' => $dirName) : $dirContent;

        return $dirContent;
    }

    /**
     * @desc  创建目录
     *
     * @param $dirName
     * @return mixed
     */
    public function createDir($dirName = '')
    {
        $dirIsExist = $this->checkFileExists($dirName);

        if ($dirIsExist == true) {
            self::$_error = self::$_fileIndex == 2 ? '目录已存在！' : '创建目录名与文件名冲突！';
            return false;
        }

        return false !== mkdir($dirName, 644) ? true : false;
    }

    public function getFileSize($dirName)
    {
        $totalSize = $this->calculateDirSize($dirName);
        //return $totalSize;
        return $this->calculateFileSize($totalSize);
    }

    /**
     * @desc  删除目录及目录中的文件
     *
     * @param $dirName
     * @return bool
     */
    public function delFile($dirName)
    {
        $delFailed = true;
        $dir = $this->makeDirFile($dirName);

        if (!empty($dir['file'])) {
            foreach ($dir['file'] as $fileName) {
                $delFailed = unlink($fileName);   //需要判断文件的资源是否被占用
                if (!$delFailed) {
                    self::$_error = $fileName . '删除失败！';
                    die(self::$_error);
                }
            }
        }

        if (!empty($dir['dir'])) {
            foreach ($dir['dir'] as $dirName) {

                $delFailed = rmdir($dirName);
                if (!$delFailed) {
                    self::$_error = $dirName . '删除失败！';
                    die(self::$_error);
                }
            }
        }

        $delFailed = rmdir($dirName);

        return $delFailed;
    }

    /**
     * @desc 移动目录
     *
     * @param $srcDir
     * @param $destDir
     *
     * @return bool
     */
    public function moveFile($srcDir, $destDir)
    {
        $destDirPath = $this->createDestDir($srcDir, $destDir);

        if (false === $destDirPath) {
            return false;
        }

        if (false === rename($srcDir, $destDirPath)) {
            self::$_error = $srcDir . '移动失败！';
            return false;
        }

        return true;
    }

    /**
     * @desc  复制目录
     *
     * @param $srcDir
     * @param $destDir
     * @return bool
     */
    public function copyFile($srcDir, $destDir)
    {
        $dirFile = $this->makeDirFile($srcDir);

        if (empty($dirFile)) {
            return false;
        }

        if (!empty($dirFile['dir'])) {
            foreach ($dirFile['dir'] as $dir) {
                $createRes = $this->createDestDir($dir, $destDir);

                if (false == $createRes) {
                    self::$_error = $dir . '目录复制失败！';
                    die();
                }
            }
        }

        if (!empty($dirFile['file'])) {
            $oldDirLength = strlen($srcDir);
            foreach ($dirFile['file'] as $srcFile) {
                $relatePath   = substr($srcFile, $oldDirLength);
                $newFile = $destDir . '/' . $relatePath;
                $copyRes = copy($srcFile, $newFile);

                if (false === $copyRes) {
                    self::$_error = $srcFile . '文件复制失败！';
                    die;
                }
            }
        }

        return true;
    }

    private function readFilePath($dirName)
    {
        if (!$this->checkFileExists($dirName) || self::$_fileIndex == 1) {
            return false;
        }

        $fileStr = '';
        $handle = opendir($dirName);
        while (false !== $file = readdir($handle)) {
            if ($file != '.' && $file != '..') {
                $subFile = $dirName . '/' . $file;

                if (is_dir($subFile)) {
                    $fileStr .= $this->readFilePath($subFile) . ',';
                } else {
                    $fileStr .= $subFile . ',';
                }
            }
        }

        closedir($handle);

        return rtrim($fileStr, ',');
    }

    private function readDirPath($dirName)
    {
        if (!$this->checkFileExists($dirName) || self::$_fileIndex == 1) {
             return false;
        }

        $dirStr = '';
        $handle = opendir($dirName);
        while (false !== $file = readdir($handle)) {
            if ($file != '.' && $file != '..') {
                $subFile = $dirName . '/' . $file;
                if (is_dir($subFile)) {
                    //echo $subFile;
                    $dirStr .= $subFile . ',';
                    $dirStr .= $this->readDirPath($subFile) . ',';
                }
            }
        }

        return rtrim($dirStr, ',');
     }

    /**
     * @desc   创建目标目录
     *
     * @param $srcDir
     * @param $destDir
     * @return bool|string
     */
    private function createDestDir($srcDir, $destDir)
    {

        $dirPathArr  =$this->readDirPath($srcDir);

        $dirPosition = strrpos($srcDir, '/');
        $dirName     = substr($srcDir, $dirPosition);
        $newDirPath  = $destDir . '/' . $dirName;
        $createRest  = $this->createDir($newDirPath);

        if (false === $createRest) {
            return false;
        }

        return $newDirPath;
    }

    private function makeDirFile($dirName)
    {
        $dir = array();
        $fileStr = $this->readFilePath($dirName);
        $dirStr  = $this->readDirPath($dirName);

        if (!empty($fileStr)) {
            $fileArr = explode(',', $fileStr);
            $dir['file'] = array_filter($fileArr);
        }

        if (!empty($dirStr)) {
            $dirArr  = explode(',', $dirStr);
            $dir['dir']  = array_filter($dirArr);
        }

        return $dir;
    }

    /**
     * @desc 统计目录中文件的大小
     *
     * @param $dir
     * @return int
     */
    private function calculateDirSize($dir)
    {
        if (!is_dir($dir)) {
            return false;
        }
        $totalSize = 0;
        $handle = opendir($dir);

        while (false !== $fileName = readdir($handle)) {
            if ($fileName != '.' && $fileName != '..') {
                $subFile = $dir . '/' . $fileName;
                if (is_file($subFile)) {
                    $totalSize += filesize($subFile);
                } else {
                    $totalSize += $this->calculateDirSize($subFile);
                }
            }
        }

        closedir($handle);
        return $totalSize;
    }
}