let brandCodeInput = document.querySelectorAll('.songListBrandCodes input');
let editBrandCodesForm = document.querySelector('.songListBrands');

for (let i = 0, c = brandCodeInput.length; i < c; i++) {

    brandCodeInput[i].addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            editBrandCodesForm.submit();
        }
    });

    brandCodeInput[i].addEventListener('blur', () => {
        editBrandCodesForm.submit();   
    });
}

let brandCode = document.querySelectorAll('.songListBrandCodes label');

for (let i = 0, c = brandCode.length; i < c; i++) {

    brandCode[i].addEventListener('click', () => {
        brandCodeInput.focus();   
    });
}
