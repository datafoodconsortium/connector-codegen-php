<?php

namespace DataFoodConsortium\Connector;

use \VirtualAssembly\Semantizer\Semantizer;

interface IConnector {

    public function export(Array $objects): string;
    public function getSemantizer(): Semantizer;

}