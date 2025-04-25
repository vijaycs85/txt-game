<?php

namespace Vijaycs85\GameTxt\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Vijaycs85\GameTxt\Service\RoomLoader;
use Vijaycs85\GameTxt\Service\RoomManager;

class GameCommand extends Command
{
    protected static $defaultName = 'game:start';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title("🎲 Welcome to the Adventure Game!");

        $loader = new RoomLoader();
        $rooms = $loader->load(__DIR__ . '/../../data/rooms.json');
        $manager = new RoomManager($rooms);

        $hearts = 3;
        $currentRoom = 1;

        while ($hearts > 0 && $currentRoom !== null) {
            $currentRoom = $manager->playRoom($currentRoom, $io, $hearts);
        }

        if ($hearts <= 0) {
            $io->error("💀 You've died.");
        } else {
            $io->success("🎉 You made it!");
        }

        return Command::SUCCESS;
    }
}
