<?php

namespace App\UI\Fridge;

use Nette;
use Nette\Application\UI\Form;
use Nette\Database\Explorer;

final class FridgePresenter extends Nette\Application\UI\Presenter
{
    private Explorer $database;

    public function __construct(Explorer $database)
    {
        parent::__construct();
        $this->database = $database;
    }

    private function createItemForm(): Form
    {
        $form = new Form;
        $form->addText('name', 'Item:')
            ->setRequired('Please enter the item name.');

        $form->addDate('expiration_date', 'Expiration Date:')
            ->setRequired('Please enter the expiration date.');

        $form->addFloat('quantity', 'Quantity:')
            ->setRequired('Please enter the quantity.')
            ->addRule(Form::FLOAT, 'Quantity must be a number.')
            ->addRule(Form::MIN, 'Quantity must be greater than 0.', 0.0000001);

        $form->addSelect('unit', 'Unit:', [
            'piece' => 'Piece',
            'kg' => 'Kg',
            'g' => 'Grams',
            'liter' => 'Liters'
        ])->setRequired('Please select a unit.');

        return $form;
    }

    protected function createComponentFridgeForm(): Form
    {
        $form = $this->createItemForm();
        $form->addSubmit('submit', 'Add Item');
        $form->onSuccess[] = [$this, 'processFridgeForm'];

        return $form;
    }

    public function processFridgeForm(Form $form, $values): void
    {
        $this->database->table('items')->insert([
            'name' => $values->name,
            'expiration_date' => $values->expiration_date,
            'quantity' => (float) $values->quantity,
            'unit' => $values->unit,
            'created_at' => new \DateTime()
        ]);

        $this->flashMessage('Item added successfully.', 'success');
        $this->redirect('this');
    }

    protected function createComponentEditItemForm(): Form
    {
        $form = $this->createItemForm();
        $form->addHidden('id');
        $form->addSubmit('submit', 'Save Changes');
        $form->onSuccess[] = [$this, 'processEditItemForm'];

        return $form;
    }

    public function processEditItemForm(Form $form, $values): void
    {
        $item = $this->database->table('items')->get($values->id);
        if ($item) {
            $item->update([
                'name' => $values->name,
                'expiration_date' => $values->expiration_date,
                'quantity' => (float)$values->quantity,
                'unit' => $values->unit,
            ]);
            $this->flashMessage('Item updated successfully.', 'success');
        } else {
            $this->flashMessage('Item not found.', 'error');
        }
        $this->redirect('this');
    }

    public function renderFridge($sort = 'expiration_date', $search = ''): void
    {
        $items = $this->database->table('items')
            ->where('name LIKE ?', "%$search%")
            ->order($sort);

        $this->template->items = array_map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'expiration_date' => $item->expiration_date,
                'quantity' => (floor($item->quantity) == $item->quantity) ? $item->quantity : number_format($item->quantity, 2, '.', ''),
                'unit' => $item->unit,
                'created_at' => $item->created_at,
            ];
        }, iterator_to_array($items));

        $this->template->isEmpty = empty($this->template->items);
        $this->template->sort = $sort;
        $this->template->search = $search;
    }

    public function handleDeleteItem(int $itemId): void
    {
        $item = $this->database->table('items')->get($itemId);
        if ($item) {
            $item->delete();
            $this->flashMessage('Item deleted successfully.', 'success');
        } else {
            $this->flashMessage('Item not found.', 'error');
        }
        $this->redirect('this');
    }
}
