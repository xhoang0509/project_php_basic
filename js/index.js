const newPrices = document.querySelectorAll('.new-price');
setInterval(() => {
	newPrices.forEach(newPrice => {
		newPrice.classList.add('color-red');
	})
}, 500);

setInterval(() => {
	newPrices.forEach(newPrice => {
		newPrice.classList.remove('color-red');
	})
}, 1000);