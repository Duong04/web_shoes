<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Order!</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body, h1, p, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
            margin: 20px;
        }

        .thank-you-message {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .thank-you-image {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }

        .thank-you-message h1 {
            color: #ffba00;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .thank-you-message p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1em;
            color: white;
            background-color: #ffba00;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #d69c00;
        }

        /* Media query for mobile responsiveness */
        @media (max-width: 600px) {
            .thank-you-message h1 {
                font-size: 1.5em;
            }

            .thank-you-message p {
                font-size: 1em;
            }

            .thank-you-image {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="thank-you-message">
            <img src="https://i.pinimg.com/564x/04/01/e4/0401e4eae6895895c71441e265edfcec.jpg" alt="Thank You" class="thank-you-image">
            <h1>Thank You for Your Order!</h1>
            <p>Your order has been placed successfully. We appreciate your business and hope you enjoy your purchase. If you have any questions, please contact our customer service.</p>
            <a href="./" class="button">Continue Shopping</a>
        </div>
    </div>
</body>
</html>