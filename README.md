## Amani 2.0 Website
<a href="https://pad.stunkymonkey.de/p/amani_2.0">Main Etherpad</a>

### Development Environment
sass file in **styles/sass/**. Gulp workflow with minified version and debug css file included.

```
npm update
gulp
```

### Configuration

### Browser Caching
Add this to the `.htaccess`file to enable browser side caching (increases Google Page Rank):
```
# Browser Caching

FileETag MTime Size

<IfModule expires_module>
    ExpiresActive on
    ExpiresByType text/plain "access plus 1 week"
    ExpiresByType text/css "access plus 1 week"
    ExpiresByType text/javascript "access plus 1 week"
    ExpiresByType application/javascript "access plus 1 week"
    ExpiresByType application/x-javascript "access plus 1 week"
    ExpiresByType image/svg+xml "access plus 1 week"
    ExpiresByType image/gif "access plus 1 week"
    ExpiresByType image/png "access plus 1 week"
    ExpiresByType image/ico "access plus 1 week"
    ExpiresByType image/x-icon "access plus 1 week"
    ExpiresByType image/jpg "access plus 1 week"
    ExpiresByType image/jpe "access plus 1 week"
    ExpiresByType image/jpeg "access plus 1 week"
    ExpiresByType font/truetype "access plus 1 week"
    ExpiresByType application/x-font-ttf "access plus 1 week"
    ExpiresByType font/opentype "access plus 1 week"
    ExpiresByType application/x-font-otf "access plus 1 week"
    ExpiresByType application/font-woff "access plus 1 week"
    ExpiresByType application/vnd.ms-fontobject "access plus 1 week"
    ExpiresByType application/x-shockwave-flash "access plus 1 week"
    ExpiresByType application/x-httpd-php-source "access plus 1 week"
</IfModule>
```


#### Menus (no nesting - never!)
+ `mainMenu` - all links visble in the header
+ `footerMenu` - all links visible in the footer

#### Custom Post Types
+ `child` with custom fields using the ACF Plugin

#### Plugins
+ `Advanced Custom Fields` (Current version: 4.4.3)
	+ Kinder (bild, beschreibung, kinderdorf)
	+ Startseite (slideshow, news_item_count)
+ `WP Lightbox 2` (Current version: 3.0.5)

### Newsletter Form
The Plugin `newsletter_form` is used to create a form to subscribe to our mailman installation.

<img src="assets/02.png">
