function updatePatientHeading(filterValue) {
    let headingText = "Patient";
    if (filterValue === "today") {
        headingText += " Today";
    } else if (filterValue === "this-week") {
        headingText += "  This Week";
    } else if (filterValue === "this-month") {
        headingText += "  This Month";
    }
    document.getElementById("patient-heading").innerText = headingText;
}