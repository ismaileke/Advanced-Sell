<?php

namespace IsmailEke\Sell\command;

use IsmailEke\Sell\form\SellForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SellCommand extends Command {

	public function __construct () {
		parent::__construct("sell", "Sell Command.", "/sell");
	}

	public function execute (CommandSender $sender, string $commandLabel, array $args) {
		if (!$sender instanceof Player) return;
        $sender->sendForm(new SellForm($sender));
	}
}
