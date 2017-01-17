const webpack = require('webpack');

const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const BowerWebpackPlugin = require('bower-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const config =  {

    entry: {
        site: './web/js/',
    },

    output: {
        path: path.join(__dirname, './web/assets'),
        filename: '[name].[chunkhash].js',
    },

    module: {
        loaders: [
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract(
                    'style', // backup loader when not building .css file
                    'css!sass' // loaders to preprocess CSS
                ),
            },
            {
                test: /\.(woff2|woff|svg|ttf|eot)([\?]?.*)$/,
                loader: 'file-loader?name=[name].[ext]',
            },
        ],

        noParse: [
            /\.min\.js/,
        ],
    },

    resolve: {
        alias: {
            css: __dirname + '/web/css',
            js: __dirname + '/web/js',
        },
        modulesDirectories: [
            'node_modules',
            __dirname + '/vendor/yiisoft/yii2/assets',
        ],
    },

    plugins: [
        new BowerWebpackPlugin({
            modulesDirectories: ['./vendor/bower'],
            manifestFiles: ['bower.json', '.bower.json'],
            includes: /.*/,
            excludes: /.*\.less$/,
        }),
        new ExtractTextPlugin('[name].[contenthash].css'),
        new ManifestPlugin(),
    ],
};


config.plugins.push(
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.UglifyJsPlugin({
        compressor: {
            warnings: false,
        },
    })
);

module.exports = config;