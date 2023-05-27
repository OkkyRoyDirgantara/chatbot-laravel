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
        caches.open('my-cache').then(function(cache) {
            return cache.match(event.request).then(function(response) {
                if (response) {
                    return response; // Mengembalikan respons dari cache jika tersedia
                }

                return fetch(event.request).then(function(networkResponse) {
                    if (!networkResponse || networkResponse.status !== 200) {
                        return networkResponse; // Mengembalikan respons dari server jika tidak ada di cache atau tidak berhasil diambil dari server
                    }

                    var cacheResponse = networkResponse.clone(); // Clone respons dari server

                    var cacheExpiration = 60 * 60 * 24; // TTL dalam detik (di sini, cache akan kadaluwarsa dalam 24 jam)
                    var cacheExpirationOptions = {
                        expiration: cacheExpiration
                    };

                    caches.open('my-cache').then(function(cache) {
                        cache.put(event.request, cacheResponse, cacheExpirationOptions); // Menyimpan respons di cache dengan TTL
                    });

                    return networkResponse; // Mengembalikan respons dari server
                });
            });
        }).catch(function(error) {
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
