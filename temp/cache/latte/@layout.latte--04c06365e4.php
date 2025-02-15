<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /var/www/html/app/UI/@layout.latte */
final class Template_04c06365e4 extends Latte\Runtime\Template
{
	public const Source = '/var/www/html/app/UI/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */;
		echo '/images/favicon/favicon.ico">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */;
		echo '/libs/dropzone/dist/dropzone.css"  rel="stylesheet">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */;
		echo '/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */;
		echo '/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */;
		echo '/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */;
		echo '/css/main.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

	<title>Fridge</title>
</head>

<body>
';
		if ($flashes) /* line 27 */ {
			echo '	<div>
		<div class="alert alert-success d-flex justify-content-center" role="alert">
';
			foreach ($flashes as $flash) /* line 29 */ {
				echo '			<div';
				echo ($ʟ_tmp = array_filter(['text-success', 'flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 29 */;
				echo '>';
				echo LR\Filters::escapeHtmlText($flash->message) /* line 29 */;
				echo '</div>
';

			}

			echo '		</div>
	</div>
';
		}
		echo '
	<div class="page-wrap">
		<section class="fridge">
';
		$this->renderBlock('content', [], 'html') /* line 35 */;
		echo '		</section>
	</div>

';
		$this->renderBlock('scripts', get_defined_vars()) /* line 39 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '29'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 39 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 40 */;
		echo '/libs/jquery/dist/jquery.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 41 */;
		echo '/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 42 */;
		echo '/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 43 */;
		echo '/libs/feather-icons/dist/feather.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 44 */;
		echo '/libs/prismjs/prism.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 45 */;
		echo '/libs/apexcharts/dist/apexcharts.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 46 */;
		echo '/libs/dropzone/dist/min/dropzone.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 47 */;
		echo '/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 48 */;
		echo '/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 49 */;
		echo '/js/theme.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 50 */;
		echo '/js/fridge.js"></script>
';
	}
}
