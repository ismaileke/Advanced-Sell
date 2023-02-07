<?php

namespace IsmailEke\Sell;

use IsmailEke\Sell\command\SellCommand;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	private static Main $instance;

	public static function getInstance () : Main {
		return self::$instance;
	}

	public function onEnable () : void {
		self::$instance = $this;
		$this->getLogger()->notice("Sell Plugin Online");
		$this->saveResource("sellitems.yml");
		$this->getServer()->getCommandMap()->register("sell", new SellCommand());
	}

	public function onDisable () : void {
		$this->getLogger()->alert("Sell Plugin Offline");
	}
}
