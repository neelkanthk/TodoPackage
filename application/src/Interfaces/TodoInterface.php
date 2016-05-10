<?php

/**
 * An example Interface for your package Repositories.
 * Feel free to create more interfaces.
 * 
 * @author Neelkanth Kaushik
 * @since 1.0.0
 */

namespace TodoPackage\Application\Interfaces;

interface TodoInterface {

    public function getArray();

    public function fetchFromDb();
}
