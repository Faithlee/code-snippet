<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-8-11
 * Time: 上午10:14
 * To change this template use File | Settings | File Templates.
 */

class uploadFile {

    /**
     * @var 文件名
     */
    private $_formName;

    /**
     * @var 上传后的文件名
     */
    private $_destFile;

    /**
     * @var 指定上传的路径
     */
    private $_uploadDir;

    /**
     * @var 限制上传文件大小
     */
    private $_maxsize = 1000000;
    /**
     * @var 上传文件的类型
     */
    private $_allowType = array('gif', 'jpg', 'png');

    /**
     * @var 文件的大小
     */
    protected $_fileSize;

    /**
     * @var 上传文件的类型
     */
    protected $_fileType;
    /**
     * @var 错误信息
     */
    protected $_error = '';

    /**
     * @var 错误序号
     */
    protected $_errorNum = 0;

    /**
     * @desc 上传后文件名是否随机
     * @var bool
     */
    private $_randName = true;

    public function __construct($formName, $uploadDir, $allowType = array(), $randName = true)
    {
        $this->_formName = $formName;
        $this->_uploadDir = $uploadDir;
        $this->_randName = $randName;
        if (!empty($allowType)) {
            $this->_allowType = $allowType;
        }
    }

    public function upload()
    {
        $upload = true;
        $pathinfo = pathinfo($_FILES[$this->_formName]['name']);
        $this->_fileSize = $_FILES[$this->_formName]['size'];
        $this->_fileType = $pathinfo['extension'];
        if (!$this->_checkFileType()) {
            $this->_error = $this->_getErrorInfo();
            $upload = false;
        }

        if (!$this->_checkFileExists()){
            $this->_error = $this->_getErrorInfo();
            $upload = false;
        }

        if (!$this->_checkFileSize()) {
            $this->_error = $this->_getErrorInfo();
            $upload = false;
        }

        if (!$upload) {
            return false;
        }

        $upload = $this->moveFile();

        if (!$upload) {
            return false;
        }

        $this->_destFile = $upload;
        return $this;
    }

    public function getFilePath()
    {
        return $this->_destFile;
    }

    public function getErrorInfo()
    {
        return $this->_error;
    }

    private function moveFile()
    {
        if ($this->_errorNum) {
            return false;
        }

        if (is_uploaded_file($_FILES[$this->_formName]['tmp_name'])) {
            if ($this->_randName) {
                $uploadedFile = $this->randFileName();
            } else {
                $uploadedFile = $this->_uploadDir . '/' . $_FILES[$this->_formName]['name'];
            }

            if (!move_uploaded_file($_FILES[$this->_formName]['tmp_name'], $uploadedFile)) {
                $this->_errorNum = -3;
                return false;
            }
        }

        return $uploadedFile;
    }

    private function _getErrorInfo()
    {
        switch ($this->_errorNum) {
            case 1:
                $errorInfo = '上传的文件超过了php.ini中 upload_max_filesize 选项限制的值！';
                break;
            case 2:
                $errorInfo = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                break;
            case 3:
                $errorInfo = '文件只有部分被上传';
                break;
            case 4:
                $errorInfo = '没有文件被上传';
                break;
            case -1:
                $errorInfo = '找不到临时文件夹';
                break;
            case -2:
                $errorInfo = '创建上传目录失败，文件写入失败';
                break;
            case -3:
                $errorInfo = '文件上传失败';
                break;
            case -4:
                $errorInfo = '必须指定上传目录';
                break;
            case -5:
                $errorInfo = '上传文件的大小超过了设置大小' . $this->_maxsize;
                break;
            case -6:
                $errorInfo = '上传文件的类型不允许';
                break;
            default:
                $errorInfo = '未知错误';
        }

        return $errorInfo;
    }

    private function _checkFileExists()
    {
        if (empty($this->_uploadDir)) {
            $this->_errorNum = -4;
            return false;
        }

        if (!file_exists($this->_uploadDir)) {
            if (!mkdir($this->_uploadDir, 0755)) {
                $this->_errorNum = -3;
                return false;
            }
        }

        if (!is_writable($this->_uploadDir)) {
            $this->_errorNum = -2;
            return false;
        }

        return true;
    }

    private function _checkFileSize()
    {
        if ($this->_fileSize > $this->_maxsize) {
            $this->_errorNum = -5;
            return false;
        }
        return true;
    }

    private function _checkFileType()
    {
        if (!in_array($this->_fileType, $this->_allowType)) {
            $this->_errorNum = -6;
            return false;
        }

        return true;
    }

    private function randFileName()
    {
        $fileName = date('YmdHms', time()) . '_' . rand(10, 99);
        return $this->_uploadDir . '/' . $fileName . '.' . $this->_fileType;
    }
}