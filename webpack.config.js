var debug = process.env.NODE_ENV !== "production";
var webpack = require('webpack');
var path = require('path');

module.exports = {
	context: __dirname + "/js/react-src",
	/*devtool: debug ? "inline-sourcemap" : null,*/
	entry: {
		main : "./main.js"
	},
	module: {
		loaders: [
			{
				text: /\.js?$/,
				exclude: /(node_modules|bower_components|application|css|fonts|images|lib|system)/,
				loader: 'babel-loader',
				query: {
					presets: ['react','es2015','stage-0'],
					plugins: ['react-html-attrs', 'transform-class-properties','transform-decorators-legacy']
				}
			}
		]
	},
	output: {
		path: path.join(__dirname, "/js/"),
		filename: "react-[name].min.js"
	},
	plugins: debug ? [] : [
		new webpack.optimize.DedupePlugin(),
		new webpack.optimize.OccurenceOrderPlugin(),
		new webpack.optimize.UglifyJsPlugin({mangle:false,sourcemap:false})
	],
	externals: {
		'jquery' : '$',
	}
};