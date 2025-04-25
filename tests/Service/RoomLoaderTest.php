<?php

// tests/Service/RoomLoaderTest.php
namespace Vijaycs85\GameTxt\Tests\Service;

use PHPUnit\Framework\TestCase;
use Vijaycs85\GameTxt\Service\RoomLoader;

class RoomLoaderTest extends TestCase
{
    public function testRoomLoaderReturnsExpectedRoomObjects()
    {
        $loader = new RoomLoader();
        $rooms = $loader->load(__DIR__ . '/../../data/rooms.json');

        $this->assertIsArray($rooms);
        $this->assertArrayHasKey(1, $rooms);
        $this->assertSame(1, $rooms[1]->id);
        $this->assertNotEmpty($rooms[1]->title);
    }
}
