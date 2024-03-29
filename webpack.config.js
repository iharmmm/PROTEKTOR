const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const mode = process.env.NODE_ENV || 'development';
const devMode = mode === 'development';
const target = devMode ? 'web' : 'browserslist';
const devtool = devMode ? 'source-map' : undefined;

module.exports = {
  mode,
  target,
  devtool,
  devServer: {
    port: 3000,
    open: true,
    hot: true,
  },
  entry: {
    index: './src/index.js',
    about: './src/about.js',
    calculated: './src/calculated.js'
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    clean: true,
    filename: '[name].[contenthash].js',
    assetModuleFilename: 'assets/[name][ext]',
  },
  plugins: [
    new HtmlWebpackPlugin({
      filename: "index.html",
      template: './src/index.html',
      chunks: ['index'],
      inject: true,
    }),
    new HtmlWebpackPlugin({
      filename: "about.html",
      template: './src/about.html',
      chunks: ['index'],
      inject: true,
    }),
    new HtmlWebpackPlugin({
      filename: "calculated.html",
      template: './src/calculated.html',
      chunks: ['index'],
      inject: true,
    }),
    new CopyWebpackPlugin({
      patterns: [
        { from: 'src/sendemail.php', to: 'assets/php/sendemail.php' },
        { from: 'src/connect.php', to: 'assets/php/connect.php' },
        { from: 'src/createdb.php', to: 'assets/php/createdb.php' },
        { from: 'src/addToDataBase.php', to: 'assets/php/addToDataBase.php' },
        { from: 'src/auth.php', to: 'assets/php/auth.php' },
        { from: 'src/dashboard.php', to: 'dashboard.php' },
        { from: 'src/login.php', to: 'login.php' },
        { from: 'src/style.css', to: 'assets/css/style.css' },
        { from: 'src/feedback.php', to: 'feedback.php' },
      ],
    }),
  ],
  module: {
    rules: [
      {
        test: /\.html$/i,
        loader: 'html-loader',
      },
      {
        test: /\.php$/i,
        loader: 'php-loader',
      },
      {
        test: /\.(c|sa|sc)ss$/i,
        use: [
          devMode ? 'style-loader' : MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [require('postcss-preset-env')],
              },
            },
          },
          'group-css-media-queries-loader',
          {
            loader: 'resolve-url-loader',
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
            },
          },
        ],
      },
      {
        test: /\.woff2?$/i,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext]',
        },
      },
      {
        test: /\.(jpe?g|png|webp|gif|svg)$/i,
        use: devMode
            ? []
            : [
              {
                loader: 'image-webpack-loader',
                options: {
                  mozjpeg: {
                    progressive: true,
                  },
                  optipng: {
                    enabled: false,
                  },
                  pngquant: {
                    quality: [0.65, 0.9],
                    speed: 4,
                  },
                  gifsicle: {
                    interlaced: false,
                  },
                  webp: {
                    quality: 75,
                  },
                },
              },
            ],
        type: 'asset/resource',
      },
      {
        test: /\.m?js$/i,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
    ],
  },
};