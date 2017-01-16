var quantity 	= document.getElementById('license-quantity');
var btnBuy 		= document.getElementById('license-button');

//init our client
var shopClient = ShopifyBuy.buildClient({
	apiKey: 'fd90f06af8018733f93543a0c96debab',
	domain: 'allencorptrial.myshopify.com',
	appId: 	'6'
});

//init our UI lib
var shopUI = ShopifyBuy.UI.init(shopClient);

shopUI.createComponent('product', {
	id: 	'9117927236',
	node: 	document.getElementById('shopify-button'),

	options: {
		product: {
			iframe: false,

			text: {
				button: 'Add to cart'
			},

			classes: {
				button: 		'btn btn-buy',
				quantityInput: 	'input input-quantity'
			},

			contents: {
				img: 		false,
				title: 		false,
				price: 		false,
				options: 	false,
				quantity: 	true,
				button: 	true
			}
		},

		cart: {
			styles: {
				button: {
					'border': 				'2px solid transparent',
					'transition-property': 	'background, color, border-color',
					'transition-duration': 	0.3,
					'background': 			'#079E34',

					':hover': {
						'background': 	'transparent',
						'border-color': '#079E34',
						'color': 		'#079E34'
					}
				}
			}
		},

		toggle: {
			styles: {
				toggle: {
					'background': '#079E34',

					':hover': {
						'background': 	'#079E34',
						'opacity': 		0.9
					}
				}
			}
		}
	}
})