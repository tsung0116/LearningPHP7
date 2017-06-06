<?php

namespace Bookstore\Domain;

interface Customer 
{
    public function getMonthlyFee(): float;
    public function getAmountToBorrow(): int;
    public function getType(): string;
}