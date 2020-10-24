<?php

//功能：动态地添加、删除某个目录下的子目录或文件；统计指定目录下的文件个数；统计指定目录下的文件总大小。

class FileSystemNode
{
    private $path;
    private $isFile;
    private $subNodes = [];

    public function __construct(string $path, bool $isFile)
    {
        $this->path = $path;
        $this->isFile = $isFile;
    }

    public function countNumOfFiles()
    {
        if ($this->isFile) {
            return 1;
        }

        $numOfFile = 0;
        foreach ($this->subNodes as $node) {
            /**
             * @var FileSystemNode $node
             */
            $numOfFile += $node->countNumOfFiles();
        }

        return $numOfFile;
    }

    public function countSizeOfFiles()
    {
        if ($this->isFile) {
            if (!file_exists($this->getPath())) {
                return 0;
            }

            return filesize($this->getPath());
        }

        $sizeOfFile = 0;
        foreach ($this->subNodes as $node) {
            /**
             * @var FileSystemNode $node
             */
            $sizeOfFile += $node->countSizeOfFiles();
        }

        return $sizeOfFile;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function addSubNode(FileSystemNode $fileOrDir)
    {
        $this->subNodes[] = $fileOrDir;
    }

    public function removeSubNode(FileSystemNode $fileOrDir)
    {
        foreach ($this->subNodes as $index => $node) {
            /**
             * @var FileSystemNode $node
             */
            if ($node->getPath() === $fileOrDir->getPath()) {
                unset($this->subNodes[$index]);
            }
        }
    }
}

$path = '/Users/chenlihuang/test';
$file_obj = new FileSystemNode($path, false);
$a_dir = new FileSystemNode($path.'/a', false);
$b_dir = new FileSystemNode($path.'/b', false);
$c_dir = new FileSystemNode($path.'/c', false);
$a_file1 = new FileSystemNode($path.'/a/test.txt', true);
$a_file2 = new FileSystemNode($path.'/a/test2.txt', true);
$c_file1 = new FileSystemNode($path.'/c/1.txt', true);
$c_file2 = new FileSystemNode($path.'/c/2.txt', true);
$file_obj->addSubNode($a_dir);
$file_obj->addSubNode($b_dir);
$file_obj->addSubNode($c_dir);

$a_dir->addSubNode($a_file1);
$a_dir->addSubNode($a_file2);

$c_dir->addSubNode($c_file1);
$c_dir->addSubNode($c_file2);

echo 'file total size:'.$file_obj->countSizeOfFiles().PHP_EOL;
echo 'file total num:'.$file_obj->countNumOfFiles().PHP_EOL;