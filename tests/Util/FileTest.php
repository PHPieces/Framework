<?php

use PHPieces\Framework\Util\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    private $temp_dir;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->temp_dir = __DIR__.'/../data/temp';

        mkdir($this->temp_dir);
    }

    public function tearDown()
    {
         $files = glob($this->temp_dir.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }

        rmdir($this->temp_dir);

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function it_gets_the_contents_of_a_file()
    {
        $file = new File();

        $path = $this->temp_dir .'/temp.txt';

        $content = 'foo bar';

        file_put_contents($path, $content);

        $this->assertEquals($content, $file->get($path));
    }

    /**
     * @test
     */
    public function it_writes_content_to_file()
    {
        $file = new File();

        $path = $this->temp_dir .'/temp.txt';

        $content = 'foo bar';

        $file->put($path, $content);

        $this->assertEquals($content, file_get_contents($path));
    }

    /**
     * @test
     */
    public function it_checks_if_file_exists()
    {
        $file = new File();

        $path = $this->temp_dir .'/temp.txt';

        $content = 'foo bar';

        file_put_contents($path, $content);

        $this->assertTrue($file->exists($path));
    }
}