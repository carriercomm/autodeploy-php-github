<?php
require_once ('config.php');

if (!isset($_GET['token']) || $_GET['token'] !== TOKEN || TOKEN === 'changeme') {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

if (!file_exists(DIR.'.git') || !is_dir(DIR)) {
	shell_exec('/usr/bin/git clone '.REMOTE_REPOSITORY.' '.DIR.' 2>&1');
}
else {
	chdir(DIR);
	shell_exec('/usr/bin/git --git-dir="'.DIR.'.git" --work-tree="'.DIR.'" pull 2>&1');
}
?>