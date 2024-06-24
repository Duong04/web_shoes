const inputElement = document.getElementById("user-image");

inputElement.addEventListener("change", handleFiles);

function handleFiles() {
    const fileList = this.files;
    if (!fileList.length) {
        return;
    }

    const file = fileList[0];

    // Kiểm tra định dạng tệp
    const allowedExtensions = /(\.jpeg|\.jpg|\.png|\.webp)$/i;
    if (!allowedExtensions.exec(file.name)) {
        Swal.fire({
            title: 'Cảnh báo!',
            text: 'Vui lòng chỉ chọn các file có định dạng .jpeg, .jpg, .png, .webp',
            icon: 'warning',
            timer: 5000
        });
        this.value = "";
        return;
    }

    const reader = new FileReader();

    reader.onload = function () {
        const preview = document.getElementById("preview");
        preview.src = reader.result;
    };

    reader.readAsDataURL(file);
}
