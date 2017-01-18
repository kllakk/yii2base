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
                test: /\.css$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader'),
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
            'vendor/bower',
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

module.exports = config;