self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open('my-cache').then(function(cache) {
            return cache.addAll([
                '/manifest.json',
                '/lamongan-logo.ico',
                '/lamongan-logo.png',
                '/lamongan-logo-sm.png',
            ]);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        fetch(event.request).catch(function() {
            // Tangani kesalahan jaringan
            console.error('Error fetching:', error);
        })
    );
});
