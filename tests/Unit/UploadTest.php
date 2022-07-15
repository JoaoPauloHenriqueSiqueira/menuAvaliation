<?php

namespace Tests\Unit;

use App\Library\Upload;
use Illuminate\Http\UploadedFile;
use Mockery;
use Tests\TestCase;


class UploadTest extends TestCase
{
    protected $storage;
    protected $file;
    protected $fileSystem;

    /**
     * Initial setup
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();

        //Setup mocks
        $this->storage = $this->mock('Illuminate\Contracts\Filesystem\Factory');
        $this->file = $this->mock('Illuminate\Contracts\Filesystem');
        $this->fileSystem = $this->mock('Illuminate\Filesystem\Filesystem');
    }

   
    /** @test */
    public function an_item_can_be_uploaded()
    {
        // $uploadedFile = Mockery::mock(
        //     'Illuminate\Http\UploadedFile',
        //     [
        //         'getClientOriginalName'      => 'image-1.jpg',
        //         'getClientOriginalExtension' => 'jpg',
        //         'getPath' => '/path/to/file',
        //         'isValid' => true,
        //         'guessExtension' => 'jpg',
        //         'getRealPath' => null,
        //     ]
        // );

        // $this->fileSystem->shouldReceive('get')->andReturn(true);
        // //Set storage mocks methods
        // $disk = Mockery::mock('\Illuminate\Contracts\Filesystem\Filesystem', ['put' => null]);
        // $this->storage->shouldReceive('disk')->andReturn($disk);


        $uploadClass = new Upload($this->fileSystem,$this->storage);
        $file =  UploadedFile::fake()->image('photo1.jpeg');

        $uploadClass->upload($file, "test/file");
    }

}
