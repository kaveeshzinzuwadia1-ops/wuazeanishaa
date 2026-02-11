<?php
header('Content-Type: application/json');

// Directory to save voice notes in the web debb folder
$uploadDir = __DIR__ . '/voice_notes/';

// Create directory if it doesn't exist
if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Failed to create voice_notes directory'
        ]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audio'])) {
    $file = $_FILES['audio'];
    
    // Validate file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Upload error: ' . $file['error']
        ]);
        exit;
    }
    
    $fileName = basename($file['name']);
    
    // Generate unique filename
    $uniqueName = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
    $filePath = $uploadDir . $uniqueName;
    
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Try to convert WAV to MP3 using ffmpeg if available
        $mp3Path = $uploadDir . pathinfo($uniqueName, PATHINFO_FILENAME) . '.mp3';
        
        if (command_exists('ffmpeg')) {
            $command = escapeshellcmd("ffmpeg -i " . escapeshellarg($filePath) . " -q:a 9 -n " . escapeshellarg($mp3Path) . " 2>/dev/null");
            $output = shell_exec($command);
            
            // Remove original WAV if MP3 was created successfully
            if (file_exists($mp3Path)) {
                unlink($filePath);
                $filePath = $mp3Path;
            }
        }
        
        echo json_encode([
            'success' => true,
            'message' => 'Voice note saved successfully',
            'filename' => basename($filePath),
            'path' => 'voice_notes/' . basename($filePath)
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Failed to save voice note'
        ]);
    }
} else {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'No audio file provided'
    ]);
}

function command_exists($cmd) {
    $returnVal = shell_exec("which $cmd 2>/dev/null");
    if (PHP_OS_FAMILY === 'Windows') {
        $returnVal = shell_exec("where $cmd 2>nul");
    }
    return (!empty($returnVal) ? true : false);
}
?>
