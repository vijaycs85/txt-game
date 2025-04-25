<?php

namespace Vijaycs85\GameTxt\Service;

use Vijaycs85\GameTxt\Model\Room;

class RoomLoader
{
    public function load(string $jsonPath): array
    {
        $json = file_get_contents($jsonPath);
        $data = json_decode($json, true);

        $rooms = [];
        foreach ($data as $roomData) {
            $room = Room::fromArray($roomData);
            $rooms[$room->id] = $room;
        }

        return $rooms;
    }
}
