<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Kalkulator/Konwerter</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Skorżowa Strona</h1>

        <nav class="navbar">
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="calc.php">Kalkulator/Konwerter</a></li>
                <li><a href="about.html">O mnie</a></li>
            </ul>
        </nav>
        <h3>Kalkulatory</h3>
        <main>
            <div class="calculator-container">
                <form action="scripts/calc1.php" method="post" class="calculator">
                    <input type="number" name="num1" placeholder="Pierwsza liczba" required>
                    <select name="operation">
                        <option value="add">+</option>
                        <option value="substract">-</option>
                        <option value="multiply">*</option>
                        <option value="divide">/</option>
                    </select>
                    <input type="number" name="num2" placeholder="Druga liczba" required>

                    <div class="result-container">
                        <button type="submit">Oblicz</button>
                        <input type="text" id="result" name="result" value="<?php echo isset($_GET['result']) ? htmlspecialchars($_GET['result']) : ''; ?>" readonly>
                        <?php if (isset($_GET['error'])): ?>
                            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
                        <?php endif; ?>
                    </div>
                </form>

                <form action="scripts/converter.php" method="post" class="converter">
                    <input type="number" name="numberToConvert" placeholder="Z" required>
                    <select name="NumberFrom">
                        <option>Centymetr</option>
                        <option>Metr</option>
                        <option>Kilometr</option>
                    </select>
                    <?php
                        $conversionResult = isset($_GET['conversionResult']) ? $_GET['conversionResult'] : ''; // Renamed variable
                        echo '<input type="text" name="numberAfter" placeholder="Do" readonly value="' . htmlspecialchars($conversionResult) . '">';
                    ?>
                    <select name="NumberTo">
                        <option>Cal</option>
                        <option>Stopa</option>
                        <option>Mila</option>
                    </select>
                    <button type="submit">Zamień</button>
                </form>
            </div>
        </main>
    </body>
</html>