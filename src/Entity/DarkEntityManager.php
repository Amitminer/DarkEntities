<?php

declare(strict_types=1);

namespace AmitxD\DarkEntities\Entity;

use pocketmine\player\Player;
use pocketmine\entity\Human;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\utils\TextFormat;

abstract class DarkEntityManager extends Human {

    abstract public function getEntityType(): string;

    public function initEntity(CompoundTag $nbt): void {
        parent::initEntity($nbt);
        $this->setNameTagAlwaysVisible(true);
        $this->setNameTagVisible(true);
        $this->setNameTag("§c" . $this->getEntityType());
        $this->setHealth(100);
    }

    public function saveNBT(): CompoundTag {
        $nbt = parent::saveNBT();
        return $nbt;
    }

    public function entityBaseTick(int $tickDiff = 1): bool {
        $update = parent::entityBaseTick($tickDiff);
        // Implementing custom entity behavior here
        return $update;
    }
}
