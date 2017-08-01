<?php 

namespace nlog\NLOGNightVision;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\entity\Effect;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onHeld (PlayerItemHeldEvent $ev) {
		if ($ev->getItem()->getId() === 50 && $ev->getItem()->getDamage() === 0) {
			$effect = Effect::getEffect(Effect::NIGHT_VISION);
			$duration = 20 * 60 * 5;
			$effect->setDuration($duration);
			$ev->getPlayer()->addEffect($effect);
		}
	}
	
	public function onCommand(CommandSender $sender,Command $command, $label,array $args) {
		
		if ($command->getName() === "야간투시") {
			$effect = Effect::getEffect(Effect::NIGHT_VISION);
			$duration = 20 * 60 * 5;
			$effect->setDuration($duration);
			$this->getServer()->getPlayerExact($sender->getName())->addEffect($effect);
		}
		
	}
	
	
}