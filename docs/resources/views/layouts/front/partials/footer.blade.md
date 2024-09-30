**Laravel Project Documentation**
=====================================

**Project Overview**
-------------------

This is a Laravel project that utilizes various dependencies to provide a comprehensive solution for managing data, authentication, and more.

### Dependencies Used

Below are the dependencies used throughout the project:

#### Laravel Dependencies

* **php**: ^8.0.2
* **arielmejiadev/larapex-charts**: ^5.2
* **barryvdh/laravel-dompdf**: ^2.0
* **guzzlehttp/guzzle**: ^7.2
* **laravel/framework**: ^9.2
* **laravel/sanctum**: ^2.14.1
* **laravel/socialite**: ^5.5
* **laravel/tinker**: ^2.7
* **laravel/ui**: ^3.4
* **livewire/livewire**: ^2.12
* **maatwebsite/excel**: ^3.1
* **razorpay/razorpay**: ^2.9

#### Laravel Dev Dependencies

* **fakerphp/faker**: ^1.9.1
* **laravel/sail**: ^1.0.1
* **mockery/mockery**: ^1.4.4
* **nunomaduro/collision**: ^6.1
* **phpunit/phpunit**: ^9.5.10
* **spatie/laravel-ignition**: ^1.0

#### Node Dev Dependencies

* **@popperjs/core**: ^2.10.2
* **axios**: ^0.25
* **bootstrap**: ^5.1.3
* **laravel-mix**: ^6.0.6
* **lodash**: ^4.17.19
* **postcss**: ^8.1.14
* **resolve-url-loader**: ^5.0.0
* **sass**: ^1.32.11
* **sass-loader**: ^11.0.1

**Footer Section**
-----------------

The footer section is implemented using HTML and CSS.

```html
<footer>
    <!-- Top Part -->
    <div class="footer-top">
        <div class="container">
            <ul class="top-menu">
                {{-- <li><a href="#"><i class="fab fa-facebook"></i></a></li --}}
                {{-- <li><a href="#"><i class="fab fa-instagram"></i></a></li --}}
                {{-- <li><a href="#"><i class="fab fa-dribbble"></i></a></li --}}
            </ul>
        </div>
    </div>

    <!-- Bottom Part -->
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; 2023 Company Name. All rights reserved.</p>
            {{-- <span>Designed by Satyajit</span> --}}
        </div>
    </div>
</footer>
```

**Bot Script Added BY Satyajit**
--------------------------------

The bot script is added to the footer section.

```javascript
var currentDay = new Date().getDate();
if (currentDay <= 15) {
    var intelliticks = document.createElement('script');
    intelliticks.type = 'text/javascript';
    intelliticks.innerHTML =
        "(function(I, L, T, i, c, k, s) { if (I.iticks) return; I.iticks = { host: c, settings: s, clientId: k, cdn: L, queue: [] }; var h = T.head || T.documentElement; var e = T.createElement(i); var l = I.location; e.async = true; e.src = (L || c) + '/client/inject-v2.min.js'; h.insertBefore(e, h.firstChild); I.iticks.call = function(a, b) { I.iticks.queue.push([a, b]); }; })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'zLGpifE79tkaevvJ4_c', {});";
    document.body.appendChild(intelliticks);
} else {
    var intelliticks = document.createElement('script');
    intelliticks.type = 'text/javascript';
    intelliticks.innerHTML =
        "(function(I, L, T, i, c, k, s) { if (I.iticks) return; I.iticks = { host: c, settings: s, clientId: k, cdn: L, queue: [] }; var h = T.head || T.documentElement; var e = T.createElement(i); var l = I.location; e.async = true; e.src = (L || c) + '/client/inject-v2.min.js'; h.insertBefore(e, h.firstChild); I.iticks.call = function(a, b) { I.iticks.queue.push([a, b]); }; })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'zLGpifE79tkaevvJ4_c', {});";
    document.body.appendChild(intelliticks);
}
```

Note: The bot script is a placeholder and should be replaced with the actual script provided by Intelliticks.