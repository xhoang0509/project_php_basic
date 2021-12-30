const productNames = document.querySelectorAll('.product-name');
setInterval(() => {
	productNames.forEach(productName => {
		productName.classList.add('color-red');
	})
}, 1000);

setInterval(() => {
	productNames.forEach(productName => {
		productName.classList.remove('color-red');
	})
}, 2000);