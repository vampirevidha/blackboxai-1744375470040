<?php
// First, create a new zip archive
$zip = new ZipArchive();
$zipName = 'fitzone_project.zip';
$zipPath = sys_get_temp_dir() . '/' . $zipName;

if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    // Helper function to add files and directories recursively
    function addFilesToZip($dir, $zip, $zipDir = '') {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != $zipName && $file != 'get-files.php') {
                $filePath = $dir . '/' . $file;
                if (is_dir($filePath)) {
                    // Add directory
                    $zip->addEmptyDir($zipDir . $file);
                    addFilesToZip($filePath, $zip, $zipDir . $file . '/');
                } else {
                    // Add file
                    $zip->addFile($filePath, $zipDir . $file);
                }
            }
        }
    }

    // Add all files from current directory
    addFilesToZip(__DIR__, $zip);
    
    // Close the zip file
    $zip->close();

    // Send the file to the browser
    if (file_exists($zipPath)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipName . '"');
        header('Content-Length: ' . filesize($zipPath));
        header('Pragma: public');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        readfile($zipPath);
        unlink($zipPath); // Delete the temporary file
        exit;
    }
}

// If something went wrong, redirect back with error
header('Location: download-instructions.php?error=1');
exit;
?>
