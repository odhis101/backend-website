
App.addToCart = (e, id) => {
    e.preventDefault()

    // find product with id supplied
    const product = App.products.find((product) => product.id === id)

    // our cart 
    // we using localstorage
    let cart = JSON.parse(localStorage.getItem("cart"))

    if(cart === null) {
        cart = []
    } 
    
    // if we already had the product in the cart.
    let item = cart.find((item) => item.id === id)

    if(item) {
        item.qty++
    } else {    
        // add the product to cart
        product.qty = 1
        cart.push(product)
    }

    localStorage.setItem("cart", JSON.stringify(cart))

    console.log(`product ${product.name} has been added to cart`)
    App.updateCartButton()
}
