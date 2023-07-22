<?php

declare(strict_types=1);

namespace AmitxD\DarkEntities\Entity;

class NullEntity extends DarkEntityManager {

    public function getEntityType(): string {
        return "Null";
    }
}
