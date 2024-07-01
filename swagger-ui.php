<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="swagger-ui/swagger-ui.css" />
    <style>
        html {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }
        *, *:before, *:after {
            box-sizing: inherit;
        }
        body {
            margin: 0;
            background: #fafafa;
        }
    </style>
</head>
<body>
    <div id="swagger-ui"></div>

    <script src="swagger-ui/swagger-ui-bundle.js"> </script>
    <script src="swagger-ui/swagger-ui-standalone-preset.js"> </script>
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: "swagger.json",  // Ścieżka do Twojej specyfikacji Swagger
                dom_id: '#swagger-ui',
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                layout: "BaseLayout",
                deepLinking: true
            });

            window.ui = ui;
        }
    </script>
</body>
</html>
