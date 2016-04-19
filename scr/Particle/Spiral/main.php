<?php

namespace Particle\Spiral;

use pocketmine\plugin\PluginBase;
use pocketmine\level\particle\EnchantmentTableParticle;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\Listener;

class Spiral extends PluginBase implements Listener {
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§eSpiralEnc On");
    }
    
    
    public function onMove(PlayerMoveEvent $event) {
        $sender = $event->getPlayer();
        $level = $sender->getLevel();
        $x = $sender->getX();
        $y = $sender->getY();
        $z = $sender->getZ();
        $center = new Vector3($x, $y, $z);
        $particle = new EnchantmentTableParticle($center);
        for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20) {
        y    $x = -sin($yaw) + $center->x;
            $z = cos($yaw) + $center->z;
            $particle->setComponents($x, $y, $z);
            $level->addParticle($particle);
        }
    }
    
    public function onDisable() {
        $this->getLogger()->info("Disable");
    }
    
}
