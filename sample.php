<?php
/**
 * SQLite Database Demo for Hesten's Learning
 * This script demonstrates how to use a local file-based database (SQLite)
 * in a PHP environment like Wasmer/WASI.
 */

$dbFile = __DIR__ . '/sample.db';

try {
    // 1. Connect to SQLite (Creates the file if it doesn't exist)
    $db = new SQLite3($dbFile);
    
    // 2. Create a simple 'students' table if it doesn't exist
    $db->exec("CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        grade TEXT NOT NULL,
        last_active TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // 3. Check if we have data; if not, insert some dummy records
    $count = $db->querySingle("SELECT COUNT(*) FROM students");
    if ($count == 0) {
        $db->exec("INSERT INTO students (name, grade) VALUES ('Alice', 'Grade 3')");
        $db->exec("INSERT INTO students (name, grade) VALUES ('Bob', 'Pre-K')");
        $db->exec("INSERT INTO students (name, grade) VALUES ('Charlie', 'Grade 9')");
    }

    // 4. Fetch all records
    $results = $db->query("SELECT * FROM students ORDER BY id DESC");

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLite Demo | Hesten's Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 p-8">
    <div class="max-w-2xl mx-auto">
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-black text-indigo-600 mb-2">SQLite Demo</h1>
            <p class="text-slate-500">Local file-based data persistence for Wasmer</p>
        </header>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <p class="font-bold">Database Error</p>
                <p><?php echo $error; ?></p>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200">
                <div class="bg-indigo-600 p-4 font-bold text-white flex justify-between">
                    <span>Student Records</span>
                    <span class="opacity-75 font-normal text-sm">Stored in sample.db</span>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 uppercase text-xs tracking-wider text-slate-400 font-bold">
                            <th class="p-4">ID</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Grade</th>
                            <th class="p-4">Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $results->fetchArray(SQLITE3_ASSOC)): ?>
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors">
                                <td class="p-4 font-mono text-xs text-slate-400"><?php echo $row['id']; ?></td>
                                <td class="p-4 font-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="p-4"><span class="bg-indigo-50 text-indigo-600 px-2 py-1 rounded-md text-xs font-bold"><?php echo htmlspecialchars($row['grade']); ?></span></td>
                                <td class="p-4 text-xs text-slate-400"><?php echo $row['last_active']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="p-6 bg-slate-50 border-t border-slate-100">
                    <p class="text-sm text-slate-500 leading-relaxed italic">
                        <strong>How it works:</strong> Unlike a standard SQL server, SQLite stores the entire database in a single file called <code>sample.db</code> in this folder. It is lightweight, requires zero configuration, and travels with your code when you upload to Wasmer.
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-8 text-center">
            <a href="/" class="text-indigo-600 hover:underline font-bold">← Return to Learning Odyssey</a>
        </div>
    </div>
</body>
</html>
