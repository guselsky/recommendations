const path = require('path');

module.exports = {
	entry: {
		Main: path.resolve(__dirname, "./development/scripts/main.js"),
		Vendor: path.resolve(__dirname, "./development/scripts/vendor.js")
	},
	output: {
		path: path.resolve(__dirname, "./scripts"),
		filename: "[name].js"
	},
	module: {
		loaders: [
			{
				loader: 'babel-loader',
				query: {
					presets: ['es2015']
				},
				test: /\.js$/,
				exclude: /node_modules/
			}
		]
	}
}

// module.exports = {
// 	entry: "./development/scripts/main.js",
// 	output: {
// 		path: "./scripts",
// 		filename: "Main.js"
// 	},
// 	module: {
// 		loaders: [
// 			{
// 				loader: 'babel-loader',
// 				query: {
// 					presets: ['es2015']
// 				},
// 				test: /\.js$/,
// 				exclude: /node_modules/
// 			}
// 		]
// 	}
// }