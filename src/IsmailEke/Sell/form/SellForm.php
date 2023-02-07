<?php

namespace IsmailEke\Sell\form;

use pocketmine\form\Form;
use pocketmine\player\Player;

class SellForm implements Form {

	public function __construct (protected Player $sender) {
	}

	public function handleResponse (Player $player, $data) : void {
		if (is_null($data)) return;

		match ($data) {
            0 => $player->sendForm(new ConfirmationForm()),
		    1 => $player->sendForm(new SelectItemForm($player)),
		    2 => $player->sendForm(new ItemInformationForm())
		};
	}

    public function jsonSerialize () : array {
        return [
            "type" => "form",
            "title" => "§cSell",
            "content" => "§7Hello§c " . $this->sender->getName() . "\n",
            "buttons" => [
                ["text" => "§cSell All Sellable Items\n§7Click It", "image" => ["type" => "path", "data" => "textures/ui/send_icon"]],
                ["text" => "§cSell Selectively\n§7Click It", "image" => ["type" => "path", "data" => "textures/ui/send_icon"]],
                ["text" => "§cItem Information\n§7Click It", "image" => ["type" => "path", "data" => "textures/ui/creative_icon"]]
            ]
        ];
    }
}
