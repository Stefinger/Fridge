<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /var/www/html/app/UI/Fridge/default.latte */
final class Template_173e6f1a13 extends Latte\Runtime\Template
{
	public const Source = '/var/www/html/app/UI/Fridge/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<h1>';
		echo LR\Filters::escapeHtmlText($message) /* line 1 */;
		echo '</h1>
<div class="fw-bold text-warning">Kokot</div>
';
	}
}
