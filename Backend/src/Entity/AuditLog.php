<?php

namespace App\Entity;

class AuditLog
{
    private ?int $id = null;

    private string $action;

    private ?array $details = null;
}
