<?php

namespace Vijaycs85\GameTxt\Tests\Model;

use PHPUnit\Framework\TestCase;
use Vijaycs85\GameTxt\Model\Room;

class RoomTest extends TestCase
{
    public function testFromArrayCreatesRoomObjectCorrectly()
    {
        $data = [
        'id' => 1,
        'title' => 'Test Room',
        'description' => 'A testing chamber',
        'question' => 'What will you do?',
        'choices' => [
        ['text' => 'Choice A', 'outcome' => 'Outcome A', 'hearts' => 0, 'next' => 2]
        ]
        ];

        $room = Room::fromArray($data);

        $this->assertSame(1, $room->id);
        $this->assertSame('Test Room', $room->title);
        $this->assertSame('A testing chamber', $room->description);
        $this->assertSame('What will you do?', $room->question);
        $this->assertCount(1, $room->choices);
        $this->assertSame('Choice A', $room->choices[0]['text']);
    }
}
