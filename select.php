<?php
include "db.php";

$query = "SELECT id, temperature, humidity, time FROM sensor_data ORDER BY time DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DHT Sensor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 960px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
            padding: 20px;
        }
        h1 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e0e4eb;
        }
        th {
            background: #f0f4ff;
            color: #1f3c88;
            font-weight: 600;
        }
        tr:hover {
            background: #f7f9ff;
        }
        .note {
            margin-top: 14px;
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>DHT Sensor Dashboard</h1>
        <p class="note">Showing the latest temperature, humidity, time, and id values from the <code>sensors</code> table.</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Temperature (&deg;C)</th>
                    <th>Humidity (%)</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['temperature']); ?></td>
                            <td><?php echo htmlspecialchars($row['humidity']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No sensor data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
