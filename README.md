# generateBitcoinPriceImage
Php script for bitcoin price image generation

Use like this:
http://link.com/generateImage/index.php/?VALUE=10&CUR=USD&TYPE=24h_avg&TIMESTAMP=YES&PRECISION=7&COLOR=00FFFF&SIZE=12&FONT=calibri

Parameter VALUE is just amount you want to convert to BTC

Parameter CUR is currency and could be any value from: https://bitcoinaverage.com ('USD', 'EUR', 'GBP', 'CAD'...), default is USD.

Parameter TYPE could be 'ask', 'bid', '24h_avg', 'last', default is last.

If parameter TIMESTAMP is 'yes', then timestamp is added to image, otherwise no. Default is no timestamp added.

Parameter PRECISION allows you to round calculated value to decimals. Default is 5.

Parameter COLOR will change text color. Accept HEX values, default is black.

Parameter SIZE is size of text, default is 11.

FONT is font of text, default is arial.

Donations: paypal: amadej.pevec@gmail.com

bitcoin: 1PdHRDrRxBsohPRJMxTa5cVLNriEbJUhdP
