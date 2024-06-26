const deleteItem = document.querySelectorAll('.delete');

const confirmButton = async (title, text) => {
    return Swal.fire({
        title: title,
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancel",
        confirmButtonText: "Delete",
        showClass: {
            popup: `
                animate__animated
                animate__fadeInDown
                animate__faster
            `
        },
        hideClass: {
            popup: `
                animate__animated
                animate__fadeOutUp
                animate__faster
            `
        }
    });
}

const successMessage = (text) => {
    return Swal.fire({
        title: 'Success!',
        text: text,
        icon: 'success',
        timer: 3000,
        showClass: {
            popup: `
                animate__animated
                animate__fadeInDown
                animate__faster
            `
        },
        hideClass: {
            popup: `
                animate__animated
                animate__fadeOutUp
                animate__faster
            `
        }
    });
}

deleteItem.forEach(item => {
    item.onclick = async function (){
        const id = this.id;
        const path = document.getElementById(id).getAttribute('data-href');
        const result = await confirmButton('Are you sure you want to delete?', 'You will not be able to restore this!');
        if (result.isConfirmed) {
            try {
                const response = await fetch(path, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                });
                if (response.status == 200) {
                    successMessage('Deleted category successfully');
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        row.remove();
                    }
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
});

document.querySelectorAll('.update-order').forEach(item => {
    
    item.onclick = async () => {
        const id = item.getAttribute('data-order-id');
        const status = item.getAttribute('data-original-title');
        try {
            const response = await fetch('./?role=admin&page=update-order', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: id, status: status})
            });

            if (response.status == 200) {
                successMessage('Updated status order successfully');
                document.querySelector(`tr[data-id="${id}"] .status`).innerText = status;
            }
        } catch (error) {
            console.log(error);
        }
    }
});

document.querySelectorAll('.update-status').forEach(item => {
    item.onclick = async () => {
        const id = item.getAttribute('data-user-id');
        const status = item.getAttribute('data-original-title');

        try {
            const response = await fetch('./?role=admin&page=update-status', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: id, status: status})
            });

            if (response.status == 200) {
                successMessage('Updated status user successfully');
                document.querySelector(`tr[data-id="${id}"] .status`).innerText = status;
            }
        } catch (error) {
            console.log(error);
        }
    }
});

document.querySelectorAll('.update-role').forEach(item => {
    item.onclick = async () => {
        const roleId = item.getAttribute('data-role-id');
        const userId = item.getAttribute('data-user-id');
        const roleName = item.getAttribute('data-role-name');

        try {
            const response = await fetch('./?role=admin&page=update-user-role', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({userId: userId, roleId: roleId})
            });

            if (response.status == 200) {
                successMessage('Updated role user successfully');
                document.querySelector(`tr[data-id="${userId}"] .role-name`).innerText = roleName;
            }
        } catch (error) {
            console.log(error);
        }
    }
});

const cart = document.querySelectorAll('.add-cart');

cart.forEach(item => {
    item.onclick = async function () {
        const id = this.id;
        let quantity = 1;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const page = urlParams.get('page');
        if (page == 'product-detail') {
            quantity = document.getElementById('sst').value;
        }
        try {
            const response = await fetch("./?page=add-cart", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id, quantity: quantity })
            });
            if (response.status == 200) {
                successMessage('Add to cart successfully');
                const cart = JSON.parse(getCookie('cart'));
                document.querySelector('#count-cart').innerText = Object.keys(cart).length;
            }
        } catch (error) {
            console.log(error);
        }
    };
});

const removeCart = document.querySelectorAll('.remove-cart');
removeCart.forEach(item => {
    item.onclick = async function() {
        const path = item.getAttribute('data-href');
        const id = this.id;
        try {
            const response = await fetch(path, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
            });
            if (response.status == 200) {
                const cart = JSON.parse(getCookie('cart'));
                const row = document.querySelector(`tr[data-id="${id}"]`);
                let subtotal = 0;
                let totalAmount = 0;
                if (row) {
                    row.remove();
                }

                for(const key in cart) {
                    subtotal += (cart[key].quantity * cart[key].price);
                }
    
                checkSubTotal(subtotal);
                document.querySelector('#count-cart').innerText = Object.keys(cart).length;

                if (Object.keys(cart).length == 0) {
                    document.querySelector('.container-cart').innerHTML = layoutCartEmpty();
                }
            }
        } catch (error) {
            console.error(error);
        }
    }
});

const getCookie = (name) => {
    let cookieArr = document.cookie.split(";");
    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split("=");
        if (name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

const updateQuantity = async (id, count) => {
    const quantityInput = document.querySelector(`#sst-${id}`);
    let quantity = parseInt(quantityInput.value);

    quantity += parseInt(count);

    if (quantity >= 10) {
        quantity = 10;
    } else if (quantity <= 0) {
        quantity = 1;
    }

    quantityInput.value = quantity;

    await updateCartQuantity(id, quantity);
}

const updateCartQuantity = async (id, quantity) => {
    try {
        const response = await fetch(`./?page=update-quantity`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id, quantity: quantity })
        });
        if (response.status == 200) {
            const cart = JSON.parse(getCookie('cart'));
            const item = cart[id];
            let subtotal = 0;
            for(const key in cart) {
                subtotal += (cart[key].quantity * cart[key].price);
            }

            checkSubTotal(subtotal);
            document.querySelector('.total-'+id).innerText = `$${Math.round(item.price * item.quantity)}.00`;
        }
    } catch (error) {
        console.error('Failed to update cart quantity:', error);
    }
}

const checkSubTotal = (subtotal) => {
    let totalAmount = 0;
    if (subtotal < 100 && subtotal >= 50) {
        totalAmount = subtotal + 5;
        document.querySelector('.list .active').classList.remove('active');
        document.querySelector('.active-1').classList.add('active');
    }else if (subtotal < 50) {
        totalAmount = subtotal + 10;
        document.querySelector('.list .active').classList.remove('active');
        document.querySelector('.active-2').classList.add('active');
    }else {
        totalAmount = subtotal + 0;
        document.querySelector('.list .active').classList.remove('active');
        document.querySelector('.active-3').classList.add('active');
    }

    document.querySelector('.subtotal').innerText = `$${Math.round(subtotal)}.00`;
    document.querySelector('.total-amount').innerText = `$${Math.round(totalAmount)}.00`;
}

const layoutCartEmpty = () => {
    return `<div class="container-fluid mt-10">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="card">
                            <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center">
                                    <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                    <h3><strong>Your Cart is Empty</strong></h3>
                                    <h4>Add something to make me happy ^_^</h4>
                                    <a href="./" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>`;
}

const searchInput = document.querySelector('#search_input');

searchInput.onblur = () => {
    setTimeout(() => {
        document.querySelector('.search-data').style.display = 'none';
    }, 1000)
};

searchInput.onfocus = () => {
    document.querySelector('.search-data').style.display = 'flex';
};

searchInput.addEventListener('input', async (e) => {
    const searchData = e.target.value;
    const limit = 5;
    const response = await fetch(`./?page=search&limit=${limit}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({data: searchData})
    });

    const responseData = await response.json();

    document.querySelector('.search-data').innerHTML = responseData.data;
});

document.querySelector('#filter-product').onchange = async function (e) {
    const filter = e.target.value;
    const categoryName = this.getAttribute('data-product-name');
    try {
        const response = await fetch(`./?page=product-filter&category_name=${categoryName}&filter=${filter}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });

        const responseData = await response.json();
        document.querySelector('#shop-parent').innerHTML = responseData.data;
    } catch (error) {
        console.error('Failed to filter: ', error);
    }
}

// document.querySelector('#price-range').addEventListener('click', () => {
//     const lowerValue = document.querySelector('#lower-value');
//     const upperValue = document.querySelector('#upper-value');

//     console.log(lowerValue.innerText,' + ', upperValue.innerText);
// });
