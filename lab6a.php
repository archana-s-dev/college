<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .calculator-card {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(16, 42, 67, 0.1);
        }

        h2 {
            text-align: center;
            color: #102a43;
            font-size: 1.5rem;
            margin-bottom: 24px;
            letter-spacing: 0.5px;
        }

        .input-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #486581;
            margin-bottom: 6px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 14px;
            font-size: 1rem;
            color: #102a43;
            background-color: #f8fafc;
            border: 2px solid #d9e2ec;
            border-radius: 8px;
            text-align: right;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        button[type="submit"] {
            width: 100%;
            padding: 13px;
            margin-top: 8px;
            background-color: #3b82f6;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        button[type="submit"]:hover {
            background-color: #2563eb;
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

        .results-container {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            margin-bottom: 8px;
            background-color: #f8fafc;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .result-row:last-child {
            margin-bottom: 0;
        }

        .result-label {
            color: #486581;
            font-weight: 500;
        }

        .result-value {
            color: #102a43;
            font-weight: 700;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.05rem;
        }
    </style>
</head>
<body>

<div class="calculator-card">
    <h2>Simple Calculator</h2>
    
    <form method="post">
        <div class="input-group">
            <label for="num1">Value 1</label>
            <input type="text" id="num1" name="num1" placeholder="0" value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>" />
        </div>

        <div class="input-group">
            <label for="num2">Value 2</label>
            <input type="text" id="num2" name="num2" placeholder="0" value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>" />
        </div>

        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if (is_numeric($num1) && is_numeric($num2)) {
            $div = ($num2 != 0) ? ($num1 / $num2) : "Cannot divide by 0";
            
            echo "<div class='results-container'>";
            echo "<div class='result-row'><span class='result-label'>Addition</span><span class='result-value'>" . ($num1 + $num2) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Subtraction</span><span class='result-value'>" . ($num1 - $num2) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Multiplication</span><span class='result-value'>" . ($num1 * $num2) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Division</span><span class='result-value'>" . $div . "</span></div>";
            echo "</div>";
        } else {
            echo "<script>alert('ENTER VALID NUMBERS');</script>";
        }
    }
    ?>
</div>

</body>
</html>
