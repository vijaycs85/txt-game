<?php

namespace Vijaycs85\GameTxt\Service;

use Symfony\Component\Console\Style\SymfonyStyle;

class RoomManager
{
  private array $rooms;

  public function __construct(array $rooms)
  {
    $this->rooms = $rooms;
  }

  public function playRoom(int $roomId, SymfonyStyle $io, int &$hearts): ?int
  {
    $room = $this->rooms[$roomId] ?? null;
    if (!$room) {
      $io->error("Room $roomId not found!");
      return null;
    }

    $io->section("Room {$room->id}: {$room->title}");
    $io->text($room->description);

    $choiceText = array_column($room->choices, 'text');
    $selected = $io->choice($room->question, $choiceText);
    $choice = array_values(array_filter($room->choices, fn($c) => $c['text'] === $selected))[0];

    $io->text($choice['outcome']);

    $hearts += $choice['hearts'];
    if ($choice['hearts'] > 0) {
      $io->success("You gained {$choice['hearts']} heart(s). Total: $hearts");
    }

    return $choice['next'] ?? null;
  }
}
