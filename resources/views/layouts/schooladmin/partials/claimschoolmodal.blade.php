<!-- Log In Modal Start -->
<div id="SchoolClaim" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>

            <!-- Modal Content Start -->
            <div style="min-height: 650px;" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Claim a New School</h5>
                    <p class="modal-description">Before claiming a new school, please verify that if the school is
                        already listed on School Dekho. To get started, kindly search for the school name below.</p>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="country"
                            style="border-radius: 8px;border: 2px solid #007bff;
                  background: #ffffff;"
                            class="form-control" type="text" oninput="showSuggestions()" placeholder="Search..."
                            autofocus />
                        <ul id="suggestions" class="list-group mt-3 p-0 shadow-sm"
                            style="display: none; border-radius: 8px; height: auto;  width: 100%;"></ul>
                    </div>
                </div>
            </div>
            <!-- Modal Content End -->

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
<script>
    const apiUrl = 'https://schooldekho.org/all/school/list';
    // const apiUrl = "https://restcountries.com/v2/all";

    function fetchCountries() {
        return fetch(apiUrl)
            .then(response => response.json())
            .then(data => data.map(country => country));
        console.log(country);
    }

    async function showSuggestions() {
        const input = document.getElementById('country');
        const suggestionsList = document.getElementById('suggestions');
        const countries = await fetchCountries();

        // Clear existing suggestions
        suggestionsList.innerHTML = '';

        // Show suggestions if input is not empty
        if (input.value.trim() !== '') {
            const filteredCountries = countries.filter(country => country.name?.toLowerCase()?.startsWith(input
                .value
                .toLowerCase()));
            const maxSuggestions = 10;
            for (let i = 0; i < Math.min(filteredCountries.length, maxSuggestions); i++) {
                const suggestionLink = document.createElement('a');
                suggestionLink.setAttribute('href', `school_claim/${filteredCountries[i].id}`);
                suggestionLink.textContent = filteredCountries[i].name;
                suggestionLink.classList.add('custom-button', 'search-dropdown');
                const suggestion = document.createElement('li');
                suggestion.classList.add('list-group-item', 'px-3', 'py-1', 'cursor-pointer', 'hover:bg-gray-100');
                suggestion.appendChild(suggestionLink);
                suggestion.addEventListener('click', () => {
                    input.value = filteredCountries[i];
                    suggestionsList.style.display = 'none';
                });
                suggestionsList.appendChild(suggestion);
            }
            suggestionsList.style.display = 'block';
        } else {
            suggestionsList.style.display = 'none';
        }
    }
</script>
<!-- Log In Modal End -->
