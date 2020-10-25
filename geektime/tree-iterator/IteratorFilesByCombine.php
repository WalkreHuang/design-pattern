<?php


abstract class FileSystemNode
{
    protected $path;

    public function __construct($path)
    {
        $this->setPath($path);
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    abstract function countNumOfFiles();

    abstract function countSizeofFiles();
}


class File extends FileSystemNode
{
    public function __construct($path)
    {
        parent::__construct($path);
    }

    public function countNumOfFiles()
    {
        return 1;
    }

    public function countSizeOfFiles()
    {
        if (!file_exists($this->getPath())) {
            return 0;
        }
        return filesize($this->getPath());
    }
}

class Dir extends FileSystemNode
{
    private $subNodes = [];

    public function __construct($path)
    {
        parent::__construct($path);
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

    public function countNumOfFiles()
    {
        $num = 0;
        foreach ($this->subNodes as $node) {
            $num += $node->countNumOfFiles();
        }

        return $num;
    }

    public function countSizeOfFiles()
    {
        $size = 0;
        foreach ($this->subNodes as $node) {
            $size += $node->countSizeOfFiles();
        }

        return $size;
    }
}

$path = '/Users/chenlihuang/test';
$dir = new Dir($path);
$a_dir = new Dir($path.'/a');
$b_dir = new Dir($path.'/b');
$c_dir = new Directory($path.'/c');

$a_file1 = new File($path.'/a/test.txt');
$a_file2 = new File($path.'/a/test2.txt');
$c_file1 = new File($path.'/c/1.txt');
$c_file2 = new File($path.'/c/2.txt');

$dir->addSubNode($a_dir);
$dir->addSubNode($b_dir);
$dir->addSubNode($c_dir);

$a_dir->addSubNode($a_file1);
$a_dir->addSubNode($a_file2);

$c_dir->addSubNode($c_file1);
$c_dir->addSubNode($c_file2);

echo 'file total size:'.$dir->countSizeOfFiles().PHP_EOL;
echo 'file total num:'.$dir->countNumOfFiles().PHP_EOL;