<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$post_id = get_the_ID();
$proto = isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : $_SERVER['REQUEST_SCHEME'];
if ($post_id) {
	$url = get_post_meta($post_id, 'url', true);
	if (preg_match('#(?<=file/d/)(.(?!/))*.#', $url, $matches)) {
		$file_id = $matches[0];
		$download_url = "https://drive.usercontent.google.com/download?id={$file_id}&export=download&authuser=0";
	} else {
		http_response_code(404);
		die();
	};

	$dir = dirname(__FILE__, 2);
	$path = preg_replace('#^(.(?!wp-content))*.#', '', $dir);
	$src = "{$proto}://{$_SERVER['HTTP_HOST']}/{$path}/stream.php?url={$download_url}";
} else {
	$dir = dirname(__FILE__, 2);
	$path = preg_replace('#^(.(?!wp-content))*.#', '', $dir);
	$src = "{$proto}://{$_SERVER['HTTP_HOST']}/{$path}/placeholder.pdf";
}
?>

<div class="wp-block-grup wp-block-vdv-pdf-reader">
	<object data="<?= $src ?>" type="application/pdf" width="100%" height="500px">
		<p>Unable to display PDF file. <a href="<?= $src ?>">Download</a> instead.</p>
    </object>
</div>
