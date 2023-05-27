self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open('my-cache').then(function(cache) {
            return cache.addAll([
                '/manifest.json',
                '/lamongan-logo.ico',
                '/lamongan-logo.png',
                '/lamongan-logo-sm.png',
                '/css/style.css',
                '/js/app.js',
            ]);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        fetch(event.request).catch(function(error) {
            // Tangani kesalahan jaringan
            console.error('Error fetching:', error);

            // Membuat tampilan HTML pesan kesalahan
            var errorResponse = `
        <html>
          <head>
            <title>Network Error</title>
            <style>
              body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f8f8f8;
              }
              h1 {
                color: #333;
                font-size: 24px;
              }
              p {
                color: #666;
                font-size: 16px;
              }
            </style>
          </head>
          <body>
            <h1>Network Error</h1>
            <p>There was a network error. Please try again later.</p>
          </body>
        </html>
      `;

            // Membuat respons dengan tampilan HTML pesan kesalahan
            var response = new Response(errorResponse, {
                status: 500,
                statusText: 'Internal Server Error',
                headers: { 'Content-Type': 'text/html' }
            });

            return response;
        })
    );
});
