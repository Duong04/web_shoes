<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Karma Shop</title>
    <link rel="shortcut icon" href="public/img/fav.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        .main {
            height: 100vh;
            background: linear-gradient(to bottom, #ffd400 50%, #f3f3f3 50%);
        }

        .main-form {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: auto;
            max-width: 400px;
            height: 100%;
        }
        
        .form {
            width: 100%;
            box-shadow: 0 0 10px #ccc;
            border-radius: 10px;
            border-radius: 10px;
            padding: 20px 0 40px;
            background-color: #fff;
        }

        .form h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .main-form form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-item {
            width: 90%;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        .form-item button,
        .form-item input {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 5px;
        }

        .form-item input {
            border: 1px solid #ccc;
            padding-left: 10px;
        }

        .form-item input:focus {
            outline: none;
            border: 1px solid #ffd400;
        }

        .form-item button {
            margin-top: 7px;
            font-weight: 600;
            font-size: 1.0rem;
            background-color: #ffbc06;
            color: #fff;
        }

        .form-item button:hover {
            opacity: 0.8;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 3px;
        }


    </style>
</head>
<body>
    <main class="main">
        <div class="main-form">
            <div class="form">
                <h3>Update password</h3>
                <form action="" method="POST" id="registration-form">
                    <div class="form-item">
                        <input autofocus id="psw" name="psw" type="password" placeholder="Password">
                        <div class="error" id="psw-error"></div>
                    </div>
                    <div class="form-item">
                        <input id="confirmPsw" name="confirmPsw" type="password" placeholder="Confirm Password">
                        <div class="error" id="confirm-psw-error"></div>
                    </div>
                    <div class="form-item">
                        <button name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="./public/js/resetPsw.js"></script>
</body>
</html>