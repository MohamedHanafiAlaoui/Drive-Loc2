let adata = document.getElementById('adata');
let nme = [];
let cry;
let apiUrl = 'http://localhost:3000/car-rent-website-template/json.php';
let filteredData = [];

let pagesize = 3;
let currentPage = 1;

async function fetchf() {
    const response = await fetch(apiUrl);
    const coins = await response.json();
    nme = coins.data;
    filteredData = nme;  
    pagination();  
}

function filterData(query) {
    if (!query ) {
        filteredData = nme;  
    }else {
        filteredData = nme.filter(car => 
            car.modele.toLowerCase().includes(query.toLowerCase()) || 
            car.TypeName.toLowerCase().includes(query.toLowerCase()) ||
            car.prix.toString().includes(query)
             || car.disponibilite.toString().includes(query.toLowerCase())
        );
    }
    currentPage = 1; 
    pagination();
}


function pagination() {
    cry = '';
    filteredData.filter((row, index) => {
        let start = (currentPage - 1) * pagesize;
        let end = currentPage * pagesize;
        if (index >= start && index < end) {
            return true;
        }
    })
    .forEach(coin => {
        cry += `
        <div class="categories-item p-4">
            <div class="categories-item-inner">
                <div class="categories-img rounded-top">
                    <img src="${coin.image || ''}" class="img-fluid w-100 rounded-top" alt="${coin.modele || 'Car Image'}">
                </div>
                <div class="categories-content rounded-bottom p-4">
                    <h4>${coin.modele || 'Unknown Car'}</h4>
                    <div class="categories-review mb-4">
                        <div class="me-3">${coin.kilometrage || '0'} km</div>
                    </div>
                    <div class="mb-4">
                        <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">$${coin.prix || '0.00'}/Day</h4>
                    </div>
                    <div class="row gy-2 gx-0 text-center mb-4">
                        <div class="col-4 border-end border-white">
                            <i class="fa fa-users text-dark"></i> <span class="text-body ms-1">${coin.colorName || 'N/A'} Color</span>
                        </div>
                        <div class="col-4 border-end border-white">
                            <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">${coin.TypeName || 'N/A'}</span>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-gas-pump text-dark"></i> <span class="text-body ms-1">${coin.disponibilite || 'N/A'}</span>
                        </div>
                    </div>
                    <a href="./detCar.PHP?id=${coin.id_car}" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                </div>
            </div>
        </div>`;
    });

    adata.innerHTML = cry;


    updatePaginationButtons();
}


function updatePaginationButtons() {
    let totalPages = Math.ceil(filteredData.length / pagesize);

  
    document.getElementById('PRE').classList.toggle('disabled', currentPage <= 1);


    document.getElementById('NEXT').classList.toggle('disabled', currentPage >= totalPages);


    let pageNumbers = '';
    for (let i = 1; i <= totalPages; i++) {
        pageNumbers += `<li class="page-item ${i === currentPage ? 'active' : ''}" data-page="${i}">
                            <span class="page-link">${i}</span>
                        </li>`;
    }
    document.getElementById('pageNumbers').innerHTML = pageNumbers;


    document.querySelectorAll('#pageNumbers .page-item').forEach(item => {
        item.addEventListener('click', function () {
            currentPage = parseInt(this.getAttribute('data-page'));
            pagination();
        });
    });
}


document.getElementById('searchInput').addEventListener('input', function () {
    let query = this.value;
    filterData(query);  
});

document.getElementById('noyes').addEventListener('input', function () {
    let query = this.value;
    filterData(query);  
});



function previous(event) {
    event.preventDefault();  
    if (currentPage > 1) {
        currentPage--;
    }
    pagination();
}

function next(event) {
    event.preventDefault(); 
    let totalPages = Math.ceil(filteredData.length / pagesize);
    if (currentPage < totalPages) {
        currentPage++;
    }
    pagination();
}

document.getElementById('PRE').addEventListener('click', previous, false);
document.getElementById('NEXT').addEventListener('click', next, false);


fetchf();
