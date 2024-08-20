<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva sugerencia</title>
        <style>
            body {
                background-color: #f9fafb;
                font-family: Arial, sans-serif;
            }
            .container {
                max-width: 32rem;
                margin-left: auto;
                margin-right: auto;
                padding: 1.5rem;
                background-color: #f3f4f6;
                border-radius: 0.5rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
            .title {
                font-size: 1.25rem;
                font-weight: bold;
                color: #374151;
                margin-bottom: 1rem;
            }
            .paragraph {
                color: #4b5563;
                margin-bottom: 0.5rem;
            }
            .info {
                color: #1f2937;
                font-weight: 500;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="title">Sugerencias</h1>
            <p class="paragraph"><span class="info">Contenido:</span> {{ $Sugerencias }}</p>
        </div>
    </body>
</html>