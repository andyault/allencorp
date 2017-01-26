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

var shopifyColor = shopifyColor || '#079E34';

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
					'background': 			shopifyColor,

					':hover': {
						'background': 	'transparent',
						'border-color': shopifyColor,
						'color': 		shopifyColor
					}
				}
			}
		},

		toggle: {
			styles: {
				toggle: {
					'background': shopifyColor,

					':hover': {
						'background': 	shopifyColor,
						'opacity': 		0.9
					}
				}
			}
		}
	}
}).then(function() {
	//clamp quantity to 1-99
	document.getElementsByClassName('input-quantity')[0].onblur = function() {
		if(this.value !== '') {
			var min = 1; //parseInt(this.attributes.min.value);
			var max = 99; //parseInt(this.attributes.max.value);

			this.value = Math.max(Math.min(this.value, max), min);
		}
	}
})