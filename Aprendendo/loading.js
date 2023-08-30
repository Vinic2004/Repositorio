function showLoading() {
	const div = document.createElement("div");
	div.classList.add("loading");
	document.body.appendChild(div);

	const div1 = document.createElement("div");
	const div2 = document.createElement("div");
	const div3 = document.createElement("div");
	div.appendChild(div1);
	div.appendChild(div2);
	div.appendChild(div3);

	setTimeout(() => hideLoading(), 1000);
}

function hideLoading() {
	const loadings = document.getElementsByClassName("loading");

	if(loadings.length){
		loadings[0].remove();
	}
}