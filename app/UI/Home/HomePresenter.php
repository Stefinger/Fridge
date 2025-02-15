<?php

declare(strict_types=1);

namespace App\UI\Home;

use Nette;
use Nette\DI\Attributes\Inject;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    #[Inject]
    public Nette\Database\Explorer $db;

    public function actionDefault()
    {
        $user = $this->db->table('items')->get(1);
        if (!$user) {
            // Ošetření případu, kdy záznam neexistuje
            $this->error('Item not found');
        }
    }
}
