**Frontend Dependencies**

Below are the frontend dependencies used throughout the project:


### CSS Libraries


*   **Bootstrap**: v5.1.3 for styling and layout
*   **Slick Carousel**: v1.8.1 for responsive carousel functionality
*   **Select2**: v4.0.13 for enhanced select box functionality

### JavaScript Libraries


*   **JQuery**: 3.6.0 for DOM manipulation and event handling
*   **PopperJS**: ^2.10.2 for tooltip and popover functionality
*   **Bootstrap**: bundled with PopperJS for styling and layout
*   **Slick Carousel**: bundled with Slick Carousel library for responsive carousel functionality

### CSS Preprocessors


*   **PostCSS**: 8.1.14 for CSS preprocessing and linting
*   **Resolve URL Loader**: ^5.0.0 for resolving URLs in CSS files
*   **SASS**: 1.32.11 for writing preprocessed CSS

### Other Dependencies


*   **Axios**: ^0.25 for making HTTP requests in JavaScript files
*   **Laravel Mix**: ^6.0.6 for compiling and bundling frontend assets
*   **Resolve URL Loader**: ^5.0.0 for resolving URLs in CSS files

### Frontend Development Tools


*   **SASS**: 1.32.11 for writing preprocessed CSS
*   **PostCSS**: 8.1.14 for CSS preprocessing and linting
*   **Laravel Mix**: ^6.0.6 for compiling and bundling frontend assets



Below is an example of how to include these dependencies in your `package.json` file:


```json
"dependencies": {
    "axios": "^0.25",
    "@popperjs/core": "^2.10.2",
    "bootstrap": "^5.1.3",
    "laravel-mix": "^6.0.6",
    "lodash": "^4.17.19",
    "postcss": "^8.1.14",
    "resolve-url-loader": "^5.0.0",
    "sass": "^1.32.11",
    "sass-loader": "^11.0.1"
}
```

To include these dependencies in your `webpack.mix.js` file:


```javascript
mix({
    // Laravel Mix configuration

}).postCss([
    'node_modules/postcss/src/_process.js',
]);

mix.setPublicPath('public');

mix.loaders = {
    sass: {
        test: /\.s(c|a)ss$/,
        use: ['style-loader', 'sass-loader'],
    },
};

```

To include these dependencies in your `app.scss` file:


```scss
// app.scss

@import 'node_modules/resolve-url-loader/index.css';

// rest of your code...
```

Note that the actual files are not included here due to their length.