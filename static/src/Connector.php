<?php

namespace DataFoodConsortium\Connector;

use \VirtualAssembly\Semantizer\Semantizer;

class Connector implements IConnector {

    private Semantizer $semantizer;
    private Array $context;

    public function __construct() {
        $this->semantizer = new Semantizer();
        // HACK: dfc should be renamed in dfc-b to comply with the UML term.
        // EasyRdf does not allow to use hyphen in prefix but it should.
        // A work in progress is here: https://github.com/sweetrdf/easyrdf/issues/32.
        $this->semantizer->setPrefix("dfc", "https://github.com/datafoodconsortium/ontology/releases/latest/download/DFC_BusinessOntology.owl#");

        $this->context = ["https://www.datafoodconsortium.org"];
    }

    public function getSemantizer(): Semantizer {
        return $this->semantizer;
    }

    public function setPrefix(string $prefix, string $uri): void {
        $this->getSemantizer()->setPrefix($prefix, $uri);
    }

    public function setContext(Array $context): void {
        $this->context = $context;
    }

    public function export(Array $objects, Array $context = null): string {
        $context = $context? $context: $this->context;
        return $this->getSemantizer()->export($objects, $context);
    }

}