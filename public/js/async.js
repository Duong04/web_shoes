const deleteCategories = document.querySelectorAll('.delete');

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

deleteCategories.forEach(item => {
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

const cart = document.querySelectorAll('.cart');

cart.forEach(item => {
    item.onclick = async function () {
        const id = this.id;
        try {
            const response = await fetch("./?page=add-cart", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id, quantity: 1 })
            });
            if (response.status == 200) {
                successMessage('Add to cart successfully');
            }
        } catch (error) {
            console.log(error);
        }
    };
})