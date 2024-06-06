const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const deleteCategories = $$('.delete');

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
        const result = await confirmButton('Are you sure you want to delete?', 'You will not be able to restore this!');
        if (result.isConfirmed) {
            try {
                const response = await fetch(`./?role=admin&page=delete-category&category_id=${id}`, {
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