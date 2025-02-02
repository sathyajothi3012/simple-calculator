<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #2c2f33;
            color: #fff;
        }

        .calculator {
            margin-top: 9%;
            background: #3c4043;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 360px; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .calculator .display {
            width: 100%;
            background: #222;
            color: #fff;
            border: none;
            outline: none;
            padding: 15%;
            font-size: 24px;
            text-align: right;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .calculator .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .calculator .button {
            background: #444;
            border: none;
            border-radius: 5px;
            padding: 20px;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }

        .calculator .button:hover {
            background: #ffa500eb;
        }

        .calculator .button.equal {
            grid-column: span 4;
            background: #ffa500;
        }

       
        @media (max-width: 576px) {
            .calculator .display {
                font-size: 20px;
            }

            .calculator .button {
                padding: 15px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="calculator">
    <input type="text" id="display" class="display" readonly>
    <div class="buttons">
        <button class="button" onclick="clearDisplay()">AC</button>
        <button class="button" onclick="deleteLast()">DEL</button>
        <button class="button" onclick="appendOperator('%')">%</button>
        <button class="button" onclick="appendOperator('/')">/</button>

        <button class="button" onclick="appendNumber(7)">7</button>
        <button class="button" onclick="appendNumber(8)">8</button>
        <button class="button" onclick="appendNumber(9)">9</button>
        <button class="button" onclick="appendOperator('*')">*</button>

        <button class="button" onclick="appendNumber(4)">4</button>
        <button class="button" onclick="appendNumber(5)">5</button>
        <button class="button" onclick="appendNumber(6)">6</button>
        <button class="button" onclick="appendOperator('-')">-</button>

        <button class="button" onclick="appendNumber(1)">1</button>
        <button class="button" onclick="appendNumber(2)">2</button>
        <button class="button" onclick="appendNumber(3)">3</button>
        <button class="button" onclick="appendOperator('+')">+</button>

        <button class="button" onclick="appendNumber(0)">0</button>
        <button class="button" onclick="appendNumber('00')">00</button>
        <button class="button" onclick="appendOperator('.')">.</button>
        <button class="button equal" onclick="calculate()">=</button>
    </div>
</div>

    <script>
        let display = document.getElementById('display');

        function appendNumber(number) {
            display.value += number;
        }

        function appendOperator(operator) {
            display.value += ` ${operator} `;
        }

        function clearDisplay() {
            display.value = '';
        }

        function deleteLast() {
            display.value = display.value.slice(0, -1);
        }

        function calculate() {
            const [num1, operator, num2] = display.value.split(' ');
            fetch('/calculate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ num1, operator, num2 })
            })
            .then(response => response.json())
            .then(data => {
                display.value = data.result;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
