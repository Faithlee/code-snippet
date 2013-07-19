<?php
/**
 * @desc 文件目录抽象类.
 * User: Administrator
 * Date: 13-8-6
 * Time: 下午10:37
 * To change this template use File | Settings | File Templates.
 */

abstract class fileDir
{
    /**
     * 文件全路径
     * @var string
     */
    protected $_path;

    /**
     * @desc 文件名
     */
    protected $_basename;

    /**
     * 文件或目录大小
     * @var int
     */
    protected $_size;

    /**
     * 文件或目录创建时间
     * @var int
     */
    protected $_ctime;

    /**
     * @文件或目录访问时间
     * @var int
     */
    protected $_atime;

    /**
     * 文件或目录修改时间
     * @var int
     */
    protected $_mtime;

    /**
     * 文件类型
     * @var string
     */
    protected $_type;

    /**
     * 索引是文件或目录 文件：1; 目录：2
     * @var int
     */
    protected static $_fileIndex = 1;

    /**
     * 保存错误
     * @var string
     */
    protected static $_error = 'No Errors!';

    /**
     * @desc   构造函数
     *
     * @param $file
     */
    public function __construct($file)
    {
        $isExist = $this->checkFileExists($file);
        if (!$isExist) {
            return false;
        }

        $this->_basename = basename($file);
        $this->_path     = realpath($file);
        $this->_size     = $this->getFileSize($file);
        $this->_ctime    = $this->getFileTime($file, 'c');
        $this->_mtime    = $this->getFileTime($file, 'm');
        $this->_atime    = $this->getFileTime($file, 'a');
        $this->_type     = $this->getFileType();
    }

    /**
     * @desc 魔术方法
     *
     * @return string
     */
    public function __toString()
    {
        $fileInfo = $this->_basename . "\n";
        $fileInfo .= '文件类型：' . $this->_type . "\n";
        $fileInfo .= '文件创建时间：' . $this->_ctime ."\n";
        $fileInfo .= '文件修改时间：' . $this->_mtime ."\n";
        $fileInfo .= '文件大小：' . $this->_size ."\n";

        return $fileInfo;
    }

    /**
     * @desc 获取文件的大小，抽象方法
     *
     * @return bool|string
     */
    abstract function getFileSize($fileName);

    /**
     * @desc 删除目录或文件
     *
     * @param $file
     * @return mixed
     */
    abstract function delFile($file);

    /**
     * @desc 移动文件
     *
     * @param $srcFile
     * @param $toFile
     */
    abstract function moveFile($srcFile, $toFile);

    /**
     * @desc 复制目录或文件
     *
     * @param $srcfile
     * @param $toFile
     */
    abstract function copyFile($srcfile, $toFile);

    /**
     * @desc 获取错误信息
     * @return string
     */
    public function getErrorInfo()
    {
        return self::$_error;
    }

    /**
     * @desc 检查文件是否存在
     *
     * @param $file
     * @return bool
     */
    protected function checkFileExists($file) {
        if (empty($file)) {
            self::$_error = '请指定目录或文件！';
            return false;
        }

        if (is_dir($file)) {
            self::$_fileIndex = 2;
            return true;
        } else if (is_file($file)) {
            self::$_fileIndex = 1;
            return true;
        }

        self::$_error = '指定的目录或文件不存在!';
        return false;
    }

    /**
     * @desc 获取文件的时间属性
     *
     * @param $file
     * @param $mode
     * @return bool|string
     */
    protected function getFileTime($file, $mode)
    {
        $humanTime = 0;
        switch ($mode) {
            case 'c':
                $humanTime = filectime($file);
                break;
            case 'm':
                $humanTime = filemtime($file);
                break;
            case 'a':
                $humanTime = fileatime($file);
                break;
            default:
                $humanTime = time();
        }

        return date('Y-m-d H:i:s', $humanTime);
    }

    /**
     * @desc 获取文件类型
     *
     * @return string
     */
    protected function getFileType()
    {
        $type = mime_content_type($this->_path);

        switch ($type) {
            case 'text/plain':
                $typeInfo = '文本文档';
                break;
            case 'text/x-php':
                $typeInfo = 'PHP文件';
                break;
            case 'application/x-shockwave-flash':
                $typeInfo = 'SWF文件';
                break;
            case 'text/html':
                $typeInfo = 'HTML文件';
                break;
            case 'image/gif':
                $typeInfo = 'GIF图像';
                break;
            case 'image/jpeg':
                $typeInfo = 'JEPG图像';
                break;
            case 'image/png':
                $typeInfo = 'PNG图像';
                break;
            case 'directory':
                $typeInfo = '文件夹';
                break;
            default:
                $typeInfo = '文件类型未知';
        }

        return $typeInfo;
    }

    /**
     * @desc 统计文件或目录的大小
     *
     * @param $fileSize
     * @return string
     */
    protected function calculateFileSize($fileSize)
    {
        $size = '';

        if ($fileSize > pow(2, 40)) {
            $size = round($fileSize / pow(2, 40), 2) . 'TB';
        } else if ($fileSize > pow(2, 30)) {
            $size = round($fileSize / pow(2, 30), 2) . 'GB';
        } else if ($fileSize > pow(2, 20)) {
            $size = round($fileSize / pow(2, 20), 2) . 'MB';
        } else IF ($fileSize > pow(2, 10)) {
            $size = round($fileSize / pow(2, 10), 2) . 'KB';
        } else {
            $size = $fileSize . 'B';

        }

        return $size;
    }
}