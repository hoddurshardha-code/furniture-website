// let cart = JSON.parse(localStorage.getItem("cart")) || [];

// function addToCart(name, price) {
//     let existing = cart.find(item => item.name === name);

//     if (existing) {
//         existing.qty += 1;
//     } else {
//         cart.push({ name: name, price: price, qty: 1 });
//     }

//     localStorage.setItem("cart", JSON.stringify(cart));
//     alert(name + " added to cart!");
// }

let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(name, price) {
    let existing = cart.find(item => item.name === name);

    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ name: name, price: price, qty: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    alert(name + " added to cart!");
}

