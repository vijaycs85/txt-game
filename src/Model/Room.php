<?php

namespace Vijaycs85\GameTxt\Model;

class Room
{
    public int $id;
    public string $title;
    public string $description;
    public string $question;
    public array $choices;

    public static function fromArray(array $data): self
    {
        $room = new self();
        $room->id = $data['id'];
        $room->title = $data['title'];
        $room->description = $data['description'];
        $room->question = $data['question'];
        $room->choices = $data['choices'];
        return $room;
    }
}
