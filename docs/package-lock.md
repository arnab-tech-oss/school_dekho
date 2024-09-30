**Dependencies**
===============

Below are the dependencies used throughout the project.


### Production Dependencies


*   **@popperjs/core**: ^2.10.2
*   **axios**: ^0.25.3 (updated version)
*   **bootstrap**: ^5.1.3
*   **laravel-mix**: ^6.0.6

### Dev Dependencies


*   **autoprefixer**: 9.7.6 (added dependency)
*   **chalk**: ^2.5.0 (updated version)
*   **clean-webpack-plugin**: ^4.0.0 (updated version)
*   **copy-webpack-plugin**: ^6.1.0 (new dependency)
*   **cross-env**: 2.7.0 (updated version)
*   **css-loader**: ^6.3.3 (updated version)
*   **esmangle**: ^4.8.5 (updated version)
*   **laravel-mix**: ^6.0.6
*   **lodash**: ^4.17.21 (updated version)
*   **postcss**: ^9.1.2 (updated version)
*   **resolve-url-loader**: ^7.0.1 (new dependency)
*   **sass**: 1.32.12 (updated version)
*   **sass-loader**: 11.0.1
*   **stylelint-config-standard**: ^21.0.0 (new dependency)
*   **webpack**: ^5.64.2 (updated version)
*   **yallist**: ^4.3.6 (updated version)


### Removed Dependencies


*   **autoprefixer**: removed from production dependencies
*   **resolve-url-loader**: removed from dev dependencies

**Code Snippets**
-----------------

Here's an example of how to use the `copy-webpack-plugin` in your Laravel Mix configuration:


```javascript
const { Extractor } = require('extract-text-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = function mix() {
    // ...
    plugins: [
        new ExtractTextPlugin({
            filename: 'styles.css',
        }),
        new CopyPlugin({
            patterns: [
                {
                    from: './node_modules/bootstrap/dist/css/bootstrap.min.css',
                    to: 'css/bootstrap.min.css',
                },
            ],
        }),
    ],
}
```

In this example, we're using the `copy-webpack-plugin` to copy a specific CSS file (`bootstrap.min.css`) from the `node_modules` directory to the `css` directory.

**Note:** Make sure to adjust the paths and filenames according to your project structure.