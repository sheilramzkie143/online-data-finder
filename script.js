// ========== FUNCTIONS FIRST ==========

function displayResults(results) {
    const resultsList = document.getElementById("results");
    resultsList.innerHTML = "";

    if (!results || results.length === 0) {
        resultsList.innerHTML = "<li>No results found.</li>";
        return;
    }

    results.forEach(record => {
        const li = document.createElement("li");
        li.textContent = `${record.firstname} ${record.middlename} ${record.lastname} - ${record.birthdate}`;
        li.onclick = () => showDetails(record);
        resultsList.appendChild(li);
    });
}

function showDetails(record) {
    document.getElementById("details").innerHTML = `
        <h2>${record.firstname} ${record.middlename} ${record.lastname}</h2>
        <p><b>Reference Code:</b> ${record.reference_code}</p>
        <p><b>Birthdate:</b> ${record.birthdate}</p>
        <p><b>Age:</b> ${record.age}</p>
        <p><b>Sex:</b> ${record.sex}</p>
        <p><b>Ext Name:</b> ${record.ext_name}</p>
        <p><b>Address:</b> ${record.province}, ${record.city_municipal}, ${record.barangay}</p>
        <p><b>Remarks:</b> ${record.remarks}</p>
    `;
}

// ========== EVENT LISTENER LAST ==========

let isSearching = false; // 🛑 anti-double submit

document.getElementById("searchForm").addEventListener("submit", function (event) {
    event.preventDefault();

    if (isSearching) return; // stop spam clicks

    const firstname = document.getElementById("firstname").value.trim();
    const middlename = document.getElementById("middlename").value.trim();
    const lastname = document.getElementById("lastname").value.trim();

    const btn = document.getElementById("searchBtn");
    const loading = document.getElementById("loading");

    if (!firstname && !middlename && !lastname) {
        alert("Maglagay ng kahit isang pangalan.");
        return;
    }

    const url = `search.php?search=1&firstname=${encodeURIComponent(firstname)}&middlename=${encodeURIComponent(middlename)}&lastname=${encodeURIComponent(lastname)}`;

    // 🔒 lock search
    isSearching = true;
    btn.disabled = true;
    btn.textContent = "Searching...";
    if (loading) loading.style.display = "block";

    fetch(url)
        .then(res => res.text())
        .then(text => {
            console.log("SERVER RESPONSE:", text);
            return JSON.parse(text); // [] is valid
        })
        .then(data => {
            displayResults(data);
        })
        .catch(err => {
            console.error("Fetch error:", err);
            alert("May error sa server. Pakisubukan ulit.");
        })
        .finally(() => {
            // 🔓 unlock search
            isSearching = false;
            btn.disabled = false;
            btn.textContent = "Search";
            if (loading) loading.style.display = "none";
        });
});
