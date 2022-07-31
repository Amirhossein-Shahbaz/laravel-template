import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// const webpack = require('webpack');
// import 'owl.carousel/dist/assets/owl.carousel.css';
// import 'owl.carousel';


export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
        // new webpack.ProvidePlugin({
        //     $: 'jquery',
        //     jQuery: 'jquery',
        //     'window.jQuery': 'jquery'
        //   }),
    ],
});
