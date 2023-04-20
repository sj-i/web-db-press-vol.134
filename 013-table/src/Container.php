<?php
namespace App;

use DI\ContainerBuilder;

class Container {
    public static function build(): \DI\Container {
        $builder = new ContainerBuilder();
        $builder->useAttributes(false);
        $builder->useAutowiring(true);
        return $builder->build();
    }
}
