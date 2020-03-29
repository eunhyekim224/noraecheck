let brandCodeInput = document.querySelectorAll('.songListBrandCodes input');
let editBrandCodesForm = document.querySelector('.songListBrands');
let brandCodeBtn = document.querySelectorAll('.songListBrandCodes');

for (let i = 0, c = brandCodeInput.length; i < c; i++) {
    let brandCodeCur = brandCodeInput[i].value;

    brandCodeInput[i].addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            e.preventDefault();
            if (!isNaN(e.target.value)) {
                editBrandCodesForm.submit();
            } else {
                e.target.value = brandCodeCur;
            }
        }
    });

    brandCodeInput[i].addEventListener('blur', (e) => {
        e.preventDefault();
        if (!isNaN(e.target.value)) {
            editBrandCodesForm.submit();
        } else {
            e.target.value = brandCodeCur;
        }
    });
}

