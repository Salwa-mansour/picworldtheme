const { merge } = require('webpack-merge');
const common = require('./webpack.common');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = merge(common, {
    mode: 'production',
   
    module: {
        rules: [
           {
                test:/\.css$/i,
                use:[
                   
                    MiniCssExtractPlugin.loader,
                      
                    ,
                   
                    'css-loader',
                    {
                    loader: "postcss-loader",
                    options: {
                        postcssOptions: {
                        plugins: [
                            
                            "autoprefixer",           
                           "cssnano"
                            ],
                        },
                    },
                    }
                  
                ]
            }
        ]
    },
    plugins: [
       
        new MiniCssExtractPlugin({
          filename: '../style.css',// relative to output.path
        }),
      ],
  
});