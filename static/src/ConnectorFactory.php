<?php

namespace DataFoodConsortium\Connector;

use \VirtualAssembly\Semantizer\IFactory;
use \VirtualAssembly\Semantizer\Semanticable;

class ConnectorFactory implements IFactory {

    private Connector $connector;

    public function __construct(Connector $connector) {
        $this->connector = $connector;
    }

    public function getConnector(): Connector {
        return $this->connector;
    }

    public function make(string $type): Semanticable {
        $type = $this->getConnector()->getSemantizer()->shorten($type);
        if ($type === "dfc:Claim") return new Claim(connector: $this->getConnector());
        if ($type === "dfc:Price") return new Price(connector: $this->getConnector());
        if ($type === "dfc:AllergenCharacteristic") return new AllergenCharacteristic(connector: $this->getConnector());
        if ($type === "dfc:NutrientCharacteristic") return new NutrientCharacteristic(connector: $this->getConnector());
        if ($type === "dfc:PhysicalCharacteristic") return new PhysicalCharacteristic(connector: $this->getConnector());
        if ($type === "dfc:Certification") return new Certification(connector: $this->getConnector());
        if ($type === "dfc:NatureOrigin") return new NatureOrigin(connector: $this->getConnector());
        if ($type === "dfc:PartOrigin") return new PartOrigin(connector: $this->getConnector());
        if ($type === "dfc:QuantitativeValue") return new QuantitativeValue(connector: $this->getConnector());
        return null;
    }

}