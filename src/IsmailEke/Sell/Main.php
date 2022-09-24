<?php

namespace IsmailEke\Sell;

use IsmailEke\Sell\command\SellCommand;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	/** @var Sell */
	private static Sell $instance;

	/**
	 * @return Sell
	 */
	public static function getInstance () : Sell {
		return self::$instance;
	}

	/**
	 * @return void
	 */
	public function onEnable () : void {
		self::$instance = $this;
		$this->getLogger()->notice("Sell Plugin Online");
		$this->saveResource("sellitems.yml");
		$this->getServer()->getCommandMap()->register("sell", new SellCommand());
	}

	/**
	 * @return void
	 */
	public function onDisable () : void {
		$this->getLogger()->alert("Sell Plugin Offline");
	}
}

