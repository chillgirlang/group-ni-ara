<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAP General Medical Clinic - Add SOAP Case</title>
    <link rel="stylesheet" href="../CSS/addSoapCase.css">
</head>
<body>
    <div class="container">
        <h2>Add SOAP Case</h2>
        <p>Fill in the information below to add a SOAP case.</p>
        <form id="soapCaseForm">
            <label for="patient-number">Patient Number:</label>
            <input type="text" id="patient-number" name="patient-number" placeholder="Enter Patient Number" required>

            <label for="diagnosis">Diagnosis:</label>
            <textarea id="diagnosis" name="diagnosis" placeholder="Enter Diagnosis" required></textarea>

            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" placeholder="Enter Symptoms" required></textarea>

            <label for="treatment-plan">Treatment Plan:</label>
            <textarea id="treatment-plan" name="treatment-plan" placeholder="Enter Treatment Plan"></textarea>

            <label for="case-status">Case Status:</label>
            <select id="case-status" name="case-status" required onchange="toggleDischargeDate()">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Closed">Closed</option>
            </select>

            <label for="admission-date">Admission Date:</label>
            <input type="date" id="admission-date" name="admission-date" required>

            <label for="discharge-date">Discharge Date:</label>
            <input type="date" id="discharge-date" name="discharge-date" disabled>

            <div class="buttons">
                <button type="button" class="cancel" onclick="goback()">CANCEL</button>
                <button type="submit" class="submit">SUBMIT</button>
            </div>
        </form>
    </div>

    <script>
    document.getElementById("soapCaseForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("addsoapcase.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === "success") {
                document.getElementById("soapCaseForm").reset();
            }
        })
        .catch(error => console.error("Error:", error));
    });

    function toggleDischargeDate() {
        let caseStatus = document.getElementById("case-status").value;
        let dischargeDate = document.getElementById("discharge-date");
        dischargeDate.disabled = (caseStatus !== "Closed");
        if (dischargeDate.disabled) dischargeDate.value = "";
    }

    function goback() {
        window.history.back();
    }
    </script>
</body>
</html>

