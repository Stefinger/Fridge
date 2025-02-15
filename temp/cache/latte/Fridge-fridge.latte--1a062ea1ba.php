<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /var/www/html/app/UI/Fridge/fridge.latte */
final class Template_1a062ea1ba extends Latte\Runtime\Template
{
	public const Source = '/var/www/html/app/UI/Fridge/fridge.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['item' => '70'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <div class="container">
        <div class="row">
            <div class="col-24">
                <h1 class="fridge__title text-center">Fridge</h1>
                <div class="fridge__form">
';
		$form = $this->global->formsStack[] = $this->global->uiControl['fridgeForm'] /* line 7 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo '                    <form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), [], false) /* line 7 */;
		echo '>
                        <div class="form-group">
                            <label for="name" class="form-label">Item</label>
                            <input type="text" class="form-control" id="name"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null, 'placeholder' => null])->attributes() /* line 10 */;
		echo ' placeholder="Apple">
                        </div>
                        <div class="form-group">
                            <label for="expiration_date" class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="expiration_date"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('expiration_date', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null])->attributes() /* line 14 */;
		echo '>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('quantity', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null, 'step' => null, 'min' => null, 'placeholder' => null])->attributes() /* line 18 */;
		echo ' step="any" min="0.0000001" placeholder="2.5">
                        </div>
                        <div class="form-group">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-select" id="unit"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('unit', $this->global)->getControlPart())->addAttributes(['class' => null, 'id' => null])->attributes() /* line 22 */;
		echo '>';
		echo $ʟ_elem->getHtml() /* line 22 */;
		echo '</select>
                        </div>
                        <div class="btn-wrap mt-4 d-flex justify-content-center">
                            <button type="submit" class="button">Add Item</button>
                        </div>
                    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 7 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
		echo '                </div>
                <h2 class="fridge__subtitle text-center text-md-start">Current Inventory</h2>
                <div class="fridge__search d-flex flex-column align-items-center align-items-md-start">
                    <form method="get" action="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('fridge')) /* line 36 */;
		echo '">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="';
		echo LR\Filters::escapeHtmlAttr($search) /* line 38 */;
		echo '" id="searchInput">
                            <button class="btn" type="button" id="clearSearch">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </form>
                    <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('fridge', ['sort' => 'expiration_date', 'search' => $search])) /* line 45 */;
		echo '" class="button">
                            Sort by Expiration Date <i class="bi bi-sort-numeric-down"></i>
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('fridge', ['sort' => 'name', 'search' => $search])) /* line 48 */;
		echo '" class="button mt-3 mt-md-0 ms-md-3">
                            Sort by Name <i class="bi bi-sort-alpha-down"></i>
                        </a>
                    </div>
                </div>
                <div class="fridge__table">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Expiration Date</th>
                            <th>Quantity (Unit)</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
';
		if ($isEmpty) /* line 65 */ {
			echo '                            <tr>
                                <td class="text-center fw-bold" colspan="5">No products found.</td>
                            </tr>
';
		} else /* line 69 */ {
			foreach ($items as $item) /* line 70 */ {
				echo '                                <tr class="';
				if ($item['expiration_date'] < (new \DateTime)->setTime(0, 0)) /* line 71 */ {
					echo 'expired';
				} elseif ($item['expiration_date'] <= (new \DateTime)->modify('+2 days') && $item['expiration_date'] >= (new \DateTime)->setTime(0, 0)) /* line 71 */ {
					echo 'near-expiry';
				}

				echo '">
                                    <td>';
				echo LR\Filters::escapeHtmlText($item['name']) /* line 72 */;
				echo '</td>
                                    <td class="expiry">
                                        <span>';
				echo LR\Filters::escapeHtmlText(($this->filters->date)($item['expiration_date'], 'd.m.Y')) /* line 74 */;
				echo '</span>
                                        <span class="icon d-none">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#d90429" class="bi bi-emoji-frown" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path><path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.5 3.5 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.5 4.5 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"></path></svg>
                                        </span>
                                    </td>
                                    <td>';
				echo LR\Filters::escapeHtmlText($item['quantity']) /* line 79 */;
				echo ' ';
				echo LR\Filters::escapeHtmlText($item['unit']) /* line 79 */;
				echo '</td>
                                    <td>';
				echo LR\Filters::escapeHtmlText(($this->filters->date)($item['created_at'], 'd.m.Y')) /* line 80 */;
				echo '</td>
                                    <td>
                                        <a type="button" class="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="';
				echo LR\Filters::escapeHtmlAttr($item['id']) /* line 82 */;
				echo '" data-name="';
				echo LR\Filters::escapeHtmlAttr($item['name']) /* line 82 */;
				echo '" data-expiration="';
				echo LR\Filters::escapeHtmlAttr(($this->filters->date)($item['expiration_date'], 'Y-m-d')) /* line 82 */;
				echo '" data-quantity="';
				echo LR\Filters::escapeHtmlAttr($item['quantity']) /* line 82 */;
				echo '" data-unit="';
				echo LR\Filters::escapeHtmlAttr($item['unit']) /* line 82 */;
				echo '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#383C51" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"></path></svg>
                                        </a>
                                        <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteItem!', ['itemId' => $item['id']])) /* line 85 */;
				echo '" class="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#383C51" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path></svg>
                                        </a>
                                    </td>
                                </tr>
';

			}

		}
		echo '                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
';
		$form = $this->global->formsStack[] = $this->global->uiControl['editItemForm'] /* line 107 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo '                    <form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), [], false) /* line 107 */;
		echo '>
                        <input type="hidden" id="editId"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('id', $this->global)->getControlPart())->addAttributes(['type' => null, 'id' => null])->attributes() /* line 108 */;
		echo '>
                        <div class="form-group">
                            <label for="editName" class="form-label">Item</label>
                            <input type="text" class="form-control" id="editName"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null])->attributes() /* line 111 */;
		echo '>
                        </div>
                        <div class="form-group">
                            <label for="editExpiration" class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="editExpiration"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('expiration_date', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null])->attributes() /* line 115 */;
		echo '>
                        </div>
                        <div class="form-group">
                            <label for="editQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="editQuantity"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('quantity', $this->global)->getControlPart())->addAttributes(['type' => null, 'class' => null, 'id' => null, 'step' => null])->attributes() /* line 119 */;
		echo ' step="any">
                        </div>
                        <div class="form-group">
                            <label for="editUnit" class="form-label">Unit</label>
                            <select class="form-select" id="editUnit"';
		echo ($ʟ_elem = Nette\Bridges\FormsLatte\Runtime::item('unit', $this->global)->getControlPart())->addAttributes(['class' => null, 'id' => null])->attributes() /* line 123 */;
		echo '>';
		echo $ʟ_elem->getHtml() /* line 123 */;
		echo '</select>
                        </div>
                        <div class="btn-wrap mt-5 d-flex justify-content-center">
                            <button type="submit" class="button">Save Changes</button>
                        </div>
                    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 107 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
		echo '                </div>
            </div>
        </div>
    </div>
';
	}
}
