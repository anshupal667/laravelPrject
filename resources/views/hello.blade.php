<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 100px; background: #1a1a2e; color: white; }
        h1 { font-size: 3rem; color: #e94560; }
        p { font-size: 1.2rem; color: #a8a8b3; }
    </style>
</head>
<body>
    <h1>Hello World!</h1>
    <p>My first Laravel page</p>
    <p>PHP Version: {{ PHP_VERSION }}</p>
    <p>Laravel Version: {{ app()->version() }}</p>
</body>
</html>