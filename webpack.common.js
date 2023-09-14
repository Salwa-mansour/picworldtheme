const path = require('path');

module.exports = {
  
    entry: './src/js/app.js',
 
    module: {
      rules: [
        {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
            loader: "babel-loader",
            options: {
            presets: ['@babel/preset-env']
            }
        }
        },
        
    ]
    },
  
    output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname ,'dist'),
    }
};