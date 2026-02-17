<?php
// Simple email log viewer
$log_dir = 'application/logs/';
$log_files = glob($log_dir . 'email_debug_*.log');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Debug Logs</title>
    <style>
        body { font-family: monospace; background: #1e1e1e; color: #d4d4d4; padding: 20px; }
        h1 { color: #4ec9b0; }
        select { padding: 10px; margin: 10px 0; font-size: 14px; }
        pre { background: #2d2d2d; padding: 20px; border-radius: 5px; overflow-x: auto; }
        .success { color: #4caf50; }
        .error { color: #f44336; }
        button { padding: 10px 20px; background: #0066cc; color: white; border: none; cursor: pointer; margin: 10px 5px 10px 0; }
        button:hover { background: #0052a3; }
    </style>
</head>
<body>
    <h1>📧 Email Debug Logs</h1>
    
    <?php if (empty($log_files)): ?>
        <p style="color: #ff9800;">No log files found yet. Submit the contact form to generate logs.</p>
    <?php else: ?>
        <form method="GET">
            <label for="logfile">Select Log File:</label>
            <select name="logfile" id="logfile" onchange="this.form.submit()">
                <option value="">-- Choose a log file --</option>
                <?php foreach ($log_files as $file): ?>
                    <?php $filename = basename($file); ?>
                    <option value="<?php echo $filename; ?>" <?php echo (isset($_GET['logfile']) && $_GET['logfile'] == $filename) ? 'selected' : ''; ?>>
                        <?php echo $filename; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <?php if (isset($_GET['logfile']) && !empty($_GET['logfile'])): ?>
            <?php 
                $selected_file = $log_dir . basename($_GET['logfile']);
                if (file_exists($selected_file)):
                    $content = file_get_contents($selected_file);
            ?>
                <button onclick="location.reload()">🔄 Refresh</button>
                <button onclick="if(confirm('Clear this log?')) location.href='?logfile=<?php echo $_GET['logfile']; ?>&clear=1'">🗑️ Clear Log</button>
                
                <?php if (isset($_GET['clear'])): ?>
                    <?php file_put_contents($selected_file, ''); ?>
                    <p style="color: #4caf50;">✓ Log cleared!</p>
                    <?php $content = ''; ?>
                <?php endif; ?>
                
                <pre><?php echo htmlspecialchars($content ?: 'Log file is empty'); ?></pre>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>