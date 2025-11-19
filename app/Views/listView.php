<!DOCTYPE html>
<html>
<head>
    <title>Leads List</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" 
          href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        .filter-box { margin-bottom: 20px; }
        .export-btn { margin-left: 10px; }

        /* ------------------------------ */
        /* IMPROVED TABLE (smaller, compact) */
        /* ------------------------------ */
        #leadTable {
            font-size: 12px;
            width: 100% !important;
            table-layout: auto;
        }

        #leadTable thead th {
            font-size: 13px;
            padding: 6px !important;
            white-space: nowrap;
        }

        #leadTable tbody td {
            padding: 5px 6px !important;
            white-space: nowrap;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Reduce DataTables spacing */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <h3 class="mb-3">Lead List</h3>

    <!-- FILTER FORM -->
    <form method="post" action="<?= base_url('/getData') ?>" class="filter-box form-inline">

        <label class="mr-2">Start Date:</label>
        <input type="date" name="start_date" class="form-control mr-3"
               value="<?= isset($_POST['start_date']) ? $_POST['start_date'] : '' ?>">

        <label class="mr-2">End Date:</label>
        <input type="date" name="end_date" class="form-control mr-3"
               value="<?= isset($_POST['end_date']) ? $_POST['end_date'] : '' ?>">

        <button type="submit" class="btn btn-primary">Filter</button>

        <!-- EXPORT BUTTON -->
        <button type="button" id="exportBtn" class="btn btn-success export-btn">
            Export Leads (Filtered)
        </button>
    </form>

    <!-- DATA TABLE (RESPONSIVE WRAPPER) -->
    <div class="table-responsive">
        <table id="leadTable" class="display table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Lead Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Center Id</th>
                    <th>Qualification Id</th>
                    <th>Utm Medium</th>
                    <th>Utm Campaign</th>
                    <th>Utm Term</th>
                    <th>Utm Content</th>
                    <th>Gad Source</th>
                    <th>Gclid</th>
                    <th>Gbraid</th>
                    <th>Api_status</th>
                    <th>Api_message</th>
                    <th>Date & Time</th>
                    <th>Lead Count (By Mobile)</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($list)): ?>
                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['full_name'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['centerId'] ?></td>
                            <td><?= $row['qualificationId'] ?></td>
                            <td><?= $row['utm_medium'] ?></td>
                            <td><?= $row['utm_campaign'] ?></td>
                            <td><?= $row['utm_term'] ?></td>
                            <td><?= $row['utm_content'] ?></td>
                            <td><?= $row['gad_source'] ?></td>
                            <td><?= $row['gclid'] ?></td>
                            <td><?= $row['gbraid'] ?></td>
                            <td><?= $row['api_status'] ?></td>
                            <td><?= $row['api_message'] ?></td>
                            <td><?= $row['ts'] ?></td>
                            <td><?= $row['lead_count'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>

        </table>
    </div>

</div>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {

    // Initialize DataTable
    var table = $('#leadTable').DataTable({
        pageLength: 25,
        ordering:  true,
        searching: true
    });

    // EXPORT BUTTON
    $("#exportBtn").click(function(){
        exportTableToCSV("leads_export.csv");
    });

});

// EXPORT FUNCTION
function exportTableToCSV(filename) {

    var csv = [];
    var rows = document.querySelectorAll("#leadTable tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText.replace(/,/g, " ")); 
        csv.push(row.join(",")); 
    }

    // Download CSV
    var csvFile;
    var downloadLink;

    csvFile = new Blob([csv.join("\n")], {type: "text/csv"});

    downloadLink = document.createElement("a");
    downloadLink.download = filename;

    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";

    document.body.appendChild(downloadLink);
    downloadLink.click();
}
</script>

</body>
</html>
