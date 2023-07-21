<?php

declare(strict_types = 1);

namespace AmitxD\DarkEntities\Manager;

use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;
use AmitxD\DarkEntities\Entity\Herobrine;
use pocketmine\world\World;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\Skin;
use AmitxD\DarkEntities\Lib\LibHimbeer\LibSkin\SkinConverter;
use AmitxD\DarkEntities\DarkEntities;
use AmitxD\DarkEntities\Lib\LibHimbeer\LibSkin\SkinGatherer;

class EntityManager {
    
    private $darkEntities;
    
    public function __construct() {
        $this->darkEntities = DarkEntities::getInstance();
    }
    
    public function registerEntities(){
        EntityFactory::getInstance()->register(Herobrine::class, function(World $world, CompoundTag $nbt): Herobrine {
            return new Herobrine(EntityDataHelper::parseLocation($nbt, $world), Herobrine::parseSkinNBT($nbt), $nbt);
        }, ["Herobrine"]);
    }
    
    public function summonHerobrine(Player $player): void {
        
        $skinPath = $this->darkEntities->getDataFolder() . "herobrineSkin.png";
        if (!is_file($skinPath)) {
            $player->sendMessage("§cHerobrine skin image not found.");
            return;
        }
        $skinData = SkinConverter::imageToSkinDataFromPngPath($skinPath);
        $nbt = new CompoundTag();
        $loc = clone $player->getLocation();
        $loc->yaw = (90 + ($player->getHorizontalFacing() * 90)) % 360;
        $entity = new Herobrine($loc, $nbt);
        $entity->setSkin($skinData);
        if (!$entity->isFlaggedForDespawn()) {
            $entity->spawnToAll();
        }
    }
    public function SummonNull() {}
    public function SummonEntity303() {}
}