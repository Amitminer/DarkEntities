<?php

declare(strict_types = 1);

namespace AmitxD\DarkEntities;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use AmitxD\DarkEntities\Manager\EntityManager;

class DarkEntities extends PluginBase {

    protected static $instance;
    private $EntityManager;

    public function onLoad(): void {
        self::$instance = $this;
    }

    public function onEnable(): void {
        $this->EntityManager = new EntityManager();
        $this->EntityManager->registerEntities();
    }


    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        switch ($command->getName()) {
            case "summonboss":
                if (count($args) === 1) {
                    $entityName = strtolower($args[0]);
                    switch ($entityName) {
                        case "herobrine":
                            $this->EntityManager->SummonHerobrine($sender);
                            break;
                        case "null":
                               $this->EntityManager->SummonNullEntity ($sender);
                            break;
                        case "entity303":
                              $this->EntityManager->SummonEntity303($sender);
                            break;
                        default:
                            $sender->sendMessage("§cUsage: /summonboss <Herobrine||Null||Entity303>");
                            break;
                    }
                } else {
                    $sender->sendMessage("§cUsage: /summonboss <Herobrine||Null||Entity303>");
                }
                return true;
        }
    }

    public static function getInstance(): self {
        return self::$instance;
    }
}
