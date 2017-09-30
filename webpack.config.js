const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
module.exports = {
	entry: './app/js/index.js',
	output: {
		filename: 'bundle.js',
		path: path.resolve(__dirname, 'bundle')
	},
	devServer: {
		contentBase: './index/html',
		hot: true,
        inline:true,
        port:3000,
        host:"localhost"

    },
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
				include: path.join(__dirname, './app'),
				options: {
					presets: ["es2015", "react"]
				},
			},
			{
				test: /\.css$/,
				use: [
					'style-loader',
					'css-loader'
				]
			},
			{
				test: /\.(png|svg|jpg|gif)$/,
				use: [
					'file-loader'
				]
			},
			{
				test: /\.(woff|woff2|eot|ttf|otf)$/,
				use: [
					'file-loader'
				]
			}
		]
	},
	plugins: [
		new webpack.HotModuleReplacementPlugin(),
		new CleanWebpackPlugin(['dist']),
		new HtmlWebpackPlugin({
			title: 'pghdev',
			template: path.join(__dirname, 'index.html'),
			filename: './index.html',
		})
	],
};