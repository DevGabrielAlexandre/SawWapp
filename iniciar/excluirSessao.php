<form method="POST">
<input type="text" name="sessaoExcluir" placeholder="Sessão">
<button type="submit" name="excluirSessao">Excluir sessão</button>
</form>

<?php
if(isset($_POST['excluirSessao'])) {
    $dir = 'C:/sawServerApi/wppconnect-server/userDataDir/' . $_POST['sessaoExcluir'];
    if (file_exists($dir)){
        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($ri as $file){
            $file->isDir() ? rmdir($file) : unlink($file);
        }
    }
    rmdir($dir);
}
?>